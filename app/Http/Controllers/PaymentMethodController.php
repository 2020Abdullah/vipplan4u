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
        $payment_methods = paymentMethod::orderBy('id','DESC')->get();
        return view('livewire.payments',compact('payment_methods'));  
    }


    }