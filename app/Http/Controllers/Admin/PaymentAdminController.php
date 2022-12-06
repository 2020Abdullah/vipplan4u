<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Account;
use DB;
class PaymentAdminController extends Controller
{
    public function index()
    {
        $payments = Payment::all();
        return view('admin.payment.index',compact('payments'));  
    }

    public function changeStatus($id){
        $paymentAdmins = Payment::where('id',$id)->first();
        return view('admin.payment.update_status',compact('paymentAdmins'));
    }




    public function updateStatus( Request $request,$id){
        $paymentAdmins = Payment::findOrfail($request->payment_id);

        // dd($paymentAdmins->account_id);

         
        
          $total_amount = Account::where('user_type', 'App\Models\User')->where('user_id', $paymentAdmins->account_id)->pluck('total_amount')->first();
          $account_user = Account::where('user_type', 'App\Models\User')->where('id',  $paymentAdmins->account_id);
        
        
        
          $account_admin = Account::where('user_type', 'App\Models\Admin')->where('user_id', 1);
          $total_deposited_amount = payment::where('id',$request->payment_id)->pluck('total_deposited_amount')->last();

        if($request->status=='active'){
            DB::table('payments')->where('id',$request->payment_id)->update(['status'=>'active']);
        
            // $account_user->update([
                            //   'total_amount' => $total_deposited_amount,
                 //   ]);    
                 
                 
                 $account_user->decrement('total_amount', $total_deposited_amount);

                $account_admin->increment('belance', $total_deposited_amount);

// if($account_user =='0'){
//     $account_user->update([
//                               'total_amount' => 0,
//                    ]); 
// }
 





        }else{
            DB::table('payments')->where('id',$request->payment_id)->update(['status'=>'inactive']);


            $account_user->increment('total_amount', $total_deposited_amount);
            $account_admin->decrement('belance', $total_deposited_amount);

            // $account_user->update([
            //     'total_amount' => $total_deposited_amount
            // ]);

            // $account_user->increment('total_amount', $total_deposited_amount);
            // $account_admin->decrement('belance', $total_deposited_amount);
        }
        // return back();






        return redirect()->route('paymentAdmin.index')->with('success', 'تم تغيير البيانات بنجاح');
    }



    public function destroy($id)
    {
        $payment = payment::find($id);
        if($payment){
                  $status = $payment->delete();

                  
                  if($status){
                      return redirect()->route('paymentAdmin.index')->with('success','payment_method successfuly deleted');
                  }else{
                      return back()->with('error','something went wrong');
                  }
        }else{
            return back()->with('error','Data not found !');
        }
    }
}
