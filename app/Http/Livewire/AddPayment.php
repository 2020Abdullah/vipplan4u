<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Payment;
use App\Models\Account;
use App\Models\Package;
use Illuminate\Http\Request;

// use App\Http\Requests\StoreSections;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

// i dont sure
use Intervention\Image\ImageManagerStatic ;

class AddPayment extends Component
{
   
    public $total_deposited_amount;
    public $payment_method_id;
    public $Proof_img;
    // public $package_id;
    public $cardid;
    public $number_account;
    public $payment_methods;

    // public $formId;


    public $currentStep = 1;

    protected $listeners = ['fileUploaded' =>'handleFileUpload'];

    public function handleFileUpload($imageData){
        // dd($imageData);
     $this->Proof_img = $imageData; 
    }

    public function mount(){
        $this->payment_methods = \App\Models\paymentMethod::orderBy('id', 'DESC')->get();
    }


    public function render()
    {
        return view('livewire.add-payment', [
            'payment_methods' =>  $this->payment_methods,
        ]);
    }

 
    public function firstStepSubmit(){

        
        $this->validate([
            'payment_method_id' => 'required',
            'total_deposited_amount' => 'required|numeric',
        ]);

        $number_account1 = \App\Models\paymentMethod::where('id',$this->payment_method_id)->pluck('number_account')->first();
        $this->number_account =   $number_account1;

        $account = Account::where('user_type', 'App\Models\User')->where('user_id', auth('web')->user()->id);

        $account->update([
            'total_amount' => $this->total_deposited_amount,
        ]);

        $this->currentStep = 2;

    }

       //secondStepSubmit_edit
       public function secondStepSubmit()
       {

     
           $this->currentStep = 3;
   
       }

       public function save()
       {

        $this->validate([
            'Proof_img' => 'required',
        ]);

        // return dd();
        $account= \App\Models\Account::findorfail(auth()->user()->id);
            
        $account->update([

            'total_amount' =>$this->total_deposited_amount,
            ]);


            
     $check_amount = Account::where('user_type','App\Models\User')->where('user_id',auth()->user()->id)->pluck('total_amount')->first();
     //$check_amount2 = Package::where('user_id',auth()->user()->id)->pluck('total_amount')->first();

     if($check_amount =32 ){

     


        \App\Models\Payment::create([

       
        // Father_INPUTS
       // $payment->payment_method = $this->payment_method;
        
        'total_deposited_amount' => $this->total_deposited_amount,
        'Proof_img' =>$this->storeImage(),
        'payment_method_id' =>$this->payment_method_id,
        // 'package_id'
    //    'package_id'=> Package::findOrFail($request->card_id),
        'account_id' => auth()->user()->id,
        // 'package_id' =>$this->package_id,
        'package_id' =>$this->cardid,

    ]);

        // set cashes accounts

        $total_amount = Account::where('user_type', 'App\Models\User')->where('user_id', auth('web')->user()->id)->pluck('total_amount')->first();

        $account_user = Account::where('user_type', 'App\Models\User')->where('user_id', auth('web')->user()->id);

        $account_admin = Account::where('user_type', 'App\Models\Admin')->where('user_id', 1);


        // updated accounts

        $account_user->update([
            'total_amount' => 0
        ]);

    }else{
        return back()->with('error','there is error');
    }
     
        
        $this->total_deposited_amount ='';
        $this->payment_method_id ='';
        $this->Proof_img ='';

        $this->currentStep = 1;

   
       }

       /// image code 
       public function storeImage(){
        
        if(!$this->Proof_img){
            return null;
        }
         // dd($this->image);
        //else 
        $img = ImageManagerStatic::make($this->Proof_img)->encode('jpg'); //get it up
        $imageName = Str::random(10).'.jpg';//get it up
        Storage::disk('public')->put($imageName,$img);//get it up
        return $imageName;
    }


       public function back($step)
       {
           $this->currentStep = $step;
       }
}
