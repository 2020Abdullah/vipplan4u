<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Account;
use App\Models\Admin;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as RequestURL;

class RegisterController extends Controller
{
    use AuthenticatesUsers;
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    public function index(){
        if(RequestURL::is('Admin/register')){
            $type = 'admin';
        }
        else {
            $type = 'user';
        }
        return view('auth.register', compact('type'));
    }

    public function register(Request $request){
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if($request->type == 'admin'){
            Admin::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            Account::create([
                'user_type' => 'App\Models\Admin',
                'user_id'   => 1,
                'belance'   => 0,
                'status'    => 'active'
            ]);

            if(auth($request->type)->attempt(['email' => $request->email, 'password' => $request->password])){
                return redirect(RouteServiceProvider::ADMIN);
            }
        }
        else {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            if(auth('web')->attempt(['email' => $request->email, 'password' => $request->password])){

                Account::create([
                    'user_type' => 'App\Models\user',
                    'user_id'   => auth('web')->user()->id,
                    'belance'   => 0,
                    'status'    => 'active'
                ]);

                return redirect(RouteServiceProvider::HOME);
            }

        }
        return redirect()->route('login');
    }

    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:255'],
    //         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //     ]);
    // }

}
