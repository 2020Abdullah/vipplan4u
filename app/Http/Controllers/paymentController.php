<?php

namespace App\Http\Controllers;

use App\Models\Package;
use Illuminate\Http\Request;

class paymentController extends Controller
{
    public function index(Request $request){
        $card_id = Request('card_id');
        $card = Package::where('id', $card_id)->first();
        return view('livewire.payment', compact('card'));
    }
}
