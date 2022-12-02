/*<?php

// namespace App\Http\Livewire;

// use Livewire\Component;
// use App\Models\Payment as AddPayment;
// use App\Models\Account;
// use App\Models\Package;

// use Illuminate\Support\Facades\Storage;
// use Illuminate\Support\Str;
// use Illuminate\Http\Request;

// // i dont sure
// use Intervention\Image\ImageManagerStatic ;


// class Payment extends Component
// {

//     public $total_deposited_amount;
//     public $payment_method;
//     public $Proof_img;
//     public $package_id ;
//     public $cardid ;

    
    // public $currentStep = 1;

    // protected $listeners = ['fileUploaded' =>'handleFileUpload'];

    // public function handleFileUpload($imageData){
    //     // dd($imageData);
    //  $this->Proof_img = $imageData; 
    // }


    // public function mount(Request $request){
    //     $this->cardid =$request->cardid;

    // }



    // public function render()
    // {
    //     return view('livewire.payment');
    // }



    // public function firstStepSubmit(){

        
    //     $this->validate([
    //         'payment_method' => 'required',
    //         'total_deposited_amount' => 'required|numeric',
    //     ]);
    //     $this->currentStep = 2;
    // }

    //    //secondStepSubmit_edit
    //    public function secondStepSubmit()
    //    {

     
    //        $this->currentStep = 3;
   
    //    }

    //    public function save()
    //    {

        // $this->validate([
        //     'Proof_img' => 'required',
        // ]);

        // // return dd();
        // $account= \App\Models\Account::findorfail(auth()->user()->id);
            
        // $account->update([

        //     'total_amount' =>$this->total_deposited_amount,
        //     ]);


            
    //  $check_amount = Account::where('user_type','App\Models\User')->where('user_id',auth()->user()->id)->pluck('total_amount')->first();
    //  //$check_amount2 = Package::where('user_id',auth()->user()->id)->pluck('total_amount')->first();

    // //  dd( $check_amount);

    // //  if($check_amount ==32 ){

     


        // \App\Models\Payment::create([

       
        // Father_INPUTS
       // $payment->payment_method = $this->payment_method;
        
    //     'total_deposited_amount' => $this->total_deposited_amount,
    //     'Proof_img' =>$this->storeImage(),
    //     'payment_method' =>$this->payment_method,
    //     // 'package_id'
    // //    'package_id'=> Package::findOrFail($request->card_id),
    //     'account_id' => auth()->user()->id,
    //     // 'package_id' =>$this->package_id,
    //     'package_id' => auth()->user()->id,

    //     ]);

     
        
    //     $this->total_deposited_amount ='';
    //     $this->payment_method ='';
    //     $this->Proof_img ='';

    //     $this->currentStep = 1;

   
    //    }

       /// image code 
    //    public function storeImage(){
        
    //     if(!$this->Proof_img){
    //         return null;
    //     }

    //     $img = ImageManagerStatic::make($this->Proof_img)->encode('jpg'); //get it up
    //     $imageName = Str::random(10).'.jpg';//get it up
    //     Storage::disk('public')->put($imageName,$img);//get it up
    //     return $imageName;
    // }

    //get image url 
//     public function getImagePathAttribute(){
//         return Storage::disk('public')->url($this->Proof_img);
//     }

      

//        public function back($step)
//        {
//            $this->currentStep = $step;
//        }

// }