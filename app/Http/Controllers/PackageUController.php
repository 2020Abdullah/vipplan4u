<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\payment;
use App\Models\User;
use App\Models\Account;

class PackageUController extends Controller
{
    public function change_package(){
        $package = Package::all();
        return view('user.package.change_package',compact('package'));
    }


    public function paied_package(){
        // $payment = payment::all();
        // $paied_package = Package::where('user_id', auth('web')->user()->id)
        // ->where('id',$payment->package_id)->get();
        // $paymentAdmins = Payment::findOrfail($request->payment_id);
        $account_id = Account::where('user_type', 'App\Models\User')->where('user_id', auth('web')->user()->id)->pluck('id')->first();

        $userss = User::pluck('id');
        // $paied_package2 = Payment::with('account,package')->get();  //that make payment by user

        // $paied_package2 = Package::with('payment')->where('account_id',$account_id)->get();

        // $paied_package2 = Payment::with('account.user')->pluck('package_id');

        $paied_package2 = payment::with('account.user')->where('account_id',$account_id)->get();  //that make payment by user

        return view('user.package.paied_package',compact('paied_package2'));


    }
}
