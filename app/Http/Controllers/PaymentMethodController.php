<?php

namespace App\Http\Controllers;

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

        // dd('gg');
        $payment_methods = paymentMethod::orderBy('id','DESC')->get();

        // dd( $payment_methods2 );
        return view('livewire.payment_methode',compact('payment_methods'));  
    }


    }