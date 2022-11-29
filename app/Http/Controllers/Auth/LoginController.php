<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Traits\AuthTrait;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ProvidersRouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request as RequestURL;
use App\Providers\RouteServiceProvider;

class LoginController extends Controller
{
    // use AuthenticatesUsers;

    use AuthTrait;

    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function loginform(){
        if(RequestURL::is('Admin/login')){
            $type = 'admin';
        }
        else {
            $type = 'web';
        }
        return view('auth.login', compact('type'));
    }

    public function login(Request $request){

       if(Auth::guard($request->type)->attempt(['email' => $request->email, 'password' => $request->password])){
            if($request->type == 'admin'){
                return redirect(RouteServiceProvider::ADMIN);
            }
            else if ($request->type == 'web') {
                return redirect(RouteServiceProvider::HOME);
            }
            else {
                return redirect()->route('user.login')->with('error', 'برجاء تسجيل الدخول أولاً');
            }
       }
       else {
            return back()->with('error', 'هناك خطأ ما برجاء إعادة المحاولة لاحقاً');
       }

    }
    public function logout() {
        if(auth('admin')->check()){
            auth('admin')->logout();
            return redirect()->route('admin.login');
        }
        else {
            auth('web')->logout();
            return redirect()->route('user.login');
        }
    }

}
