<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Support\Facades\Request as RequestURL;

class HomeController extends Controller
{
    public function welcome()
    {
        $cards = Package::where('status', 'active')->get();
        return view('index', compact('cards'));
    }

    public function admin()
    {
        return view('admin.dashboard');
    }

    public function user()
    {
        return view('user.dashboard');
    }
    
}
