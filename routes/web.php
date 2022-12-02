<?php

use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\Admin\PaymentMethodController;

use App\Http\Controllers\Livewire\AddPayment;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Auth::routes();

Route::get('/', [HomeController::class, 'welcome']);

Route::group(['middleware' => ['guest']], function(){

    Route::get('Admin/register', [RegisterController::class, 'index'])->name('admin.register');

    Route::get('user/register', [RegisterController::class, 'index'])->name('user.register');

    Route::post('register', [RegisterController::class, 'register'])->name('register');

    Route::get('user/login', [LoginController::class, 'loginform'])->name('user.login');

    Route::get('Admin/login', [LoginController::class, 'loginform'])->name('admin.login');

    Route::post('login', [LoginController::class, 'login'])->name('login');
    
});

Route::group(['middleware' => ['auth']], function(){
    Route::post('payment/{id}', [paymentController::class, 'index'])->name('payment.index');
    // Route::view('add_payment','livewire.payment');
    // Route::get('/add_payment', [AddPayment::class, 'index'])->name('add_payment');
    // Route::get('index', [PaymentMethodController::class, 'index'])->name('payment_method.index');
    Route::get('/index',[\App\Http\Controllers\PaymentMethodController::class,'index'])->name('payment_method.index');

});

// users Routes

Route::get('dashboard', [HomeController::class, 'user'])->name('user.dashboard');


// admin Routes

Route::get('admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');

Route::resource('admin/package', PackageController::class);
Route::resource('admin/payment_method', PaymentMethodController::class);


Route::get('admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');



//======================== payment ===========

