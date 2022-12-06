<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\paymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payment_methods = paymentMethod::orderBy('id','DESC')->get();
        return view('admin.payment_method.index',compact('payment_methods'));    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.payment_method.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

               // return $request->all();
               $this->validate($request, [
                'name' => 'string|required',
                'number_account' => 'string|required',
                'photo' => 'required',
             ]);


             $imageNew = '';
             if($request->hasFile('photo')){
                 $img = $request->photo;
                 $imageNew= time().'.'.rand(0,1000).'.'.$img->extension();
                 $img->move(public_path('assets/uploads') , $imageNew);
         
             }

             $new= paymentMethod::create([
                'name'=>$request->name,
                'number_account'=>$request->number_account,
                'photo' => $imageNew
            ]);
            return redirect()->route('payment_method.index')->with('success', 'تم تغيير البيانات بنجاح');
            // return $request->all();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(paymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $payment_id = $id;
        $payment = paymentMethod::where('id', $payment_id)->first();
        return view('admin.payment_method.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

        // return $request->all();
        $payment_method = paymentMethod::where('id', $request->payment_id);

        //make update for image
        // if($request->hasFile('photo')) {
   
            $imageNew = '';
            if($request->hasFile('photo')){
                $img = $request->photo;
                $imageNew= time().'.'.rand(0,1000).'.'.$img->extension();
                $img->move(public_path('assets/uploads') , $imageNew);
        
            }



            $payment_method->update([
                'name' => $request->name,
                'number_account' => $request->number_account,
      

                'photo' => $imageNew
            ]);
        // }
        return redirect()->route('payment_method.index')->with('success', 'تم حفظ البيانات بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\paymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentMethod = paymentMethod::find($id);
        if($paymentMethod){
                  $status = $paymentMethod->delete();
                  if($status){
                   
                      return redirect()->route('payment_method.index')->with('success','payment_method successfuly deleted');
                  }else{
                      return back()->with('error','something went wrong');
                  }
        }else{
            return back()->with('error','Data not found !');
        }
    }
}
