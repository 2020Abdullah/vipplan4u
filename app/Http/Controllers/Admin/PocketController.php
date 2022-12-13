<?php

namespace App\Http\Controllers\Admin;
use App\Models\payment;
use App\Models\Account;

use App\Models\PocketU;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class PocketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     ///user 
    public function index()
    {
        return view('user.pocket.index');
    }


    //Admin
    public function indexAdmin(){
        $pockets = PocketU::all();

        return view('admin.pockets.index',compact('pockets'));
    }

    public function changeStatus($id){
        $pocket = PocketU::where('id',$id)->first();
        return view('admin.pockets.update_status',compact('pocket'));
    }




    public function updateStatus( Request $request,$id){
        $paymentAdmins = PocketU::findOrfail($request->pocket_id);

        // dd($paymentAdmins->account_id);

         
        
          $total_amount = Account::where('user_type', 'App\Models\User')->where('user_id', $paymentAdmins->account_id)->pluck('total_amount')->first();
          $account_user = Account::where('user_type', 'App\Models\User')->where('id',  $paymentAdmins->account_id);
        
        
        
        //   $account_admin = Account::where('user_type', 'App\Models\Admin')->where('user_id', 1);
          $price = PocketU::where('id',$request->pocket_id)->pluck('price')->last();

        if($request->status=='active'){
            DB::table('pockets')->where('id',$request->pocket_id)->update(['status'=>'active']);
        
       
                 
                 $account_user->increment('total_amount', $price);

                // $account_admin->increment('belance', $price);




        }else{
            DB::table('pockets')->where('id',$request->pocket_id)->update(['status'=>'inactive']);


            $account_user->decrement('total_amount', $price);
            // $account_admin->decrement('belance', $price);

        }


return redirect()->route('pocketAdmin.index')->with('success', 'تم تغيير البيانات بنجاح');
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     return view('livewire.pocket.pocket');
    //       //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pocket  $pocket
     * @return \Illuminate\Http\Response
     */
    public function show(Pocket $pocket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pocket  $pocket
     * @return \Illuminate\Http\Response
     */
    public function edit(Pocket $pocket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pocket  $pocket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pocket $pocket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pocket  $pocket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pocket $pocket)
    {
        //
    }
}
