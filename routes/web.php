<?php

use App\Http\Controllers\Admin\PackageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\paymentController;
use App\Http\Controllers\Admin\PaymentMethodController;
// use App\Http\Controllers\Admin\PaymentAdminController;


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
    Route::get('/change_package',[\App\Http\Controllers\PackageUController::class,'change_package'])->name('package.change_package');
    Route::get('/paied_package',[\App\Http\Controllers\PackageUController::class,'paied_package'])->name('package.paied_package');
    Route::get('/pocket',[\App\Http\Controllers\Admin\PocketController::class,'index'])->name('pocket.index');
  
  
    Route::get('/create',[\App\Http\Livewire\Pocket\Pocket::class,'create'])->name('pocket.create');

    
});

// users Routes

Route::get('dashboard', [HomeController::class, 'user'])->name('user.dashboard');


// admin Routes

Route::get('admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');

Route::resource('admin/package', PackageController::class);
Route::resource('admin/payment_method', PaymentMethodController::class);
////Admin payment
Route::get('/index',[\App\Http\Controllers\Admin\PaymentAdminController::class,'index'])->name('paymentAdmin.index');
Route::delete('/destroy/{id}',[\App\Http\Controllers\Admin\PaymentAdminController::class,'destroy'])->name('paymentAdmin.destroy');

// Route::get('/index',[\App\Http\Controllers\Admin\PaymentAdminController::class,'index'])->name('paymentAdmin.index');
Route::get('paymentAdmin/change_status/{id}',[\App\Http\Controllers\Admin\PaymentAdminController::class,'changeStatus'])->name('paymentAdmin.change_status');
Route::post('/update_status/update/{id}',[\App\Http\Controllers\Admin\PaymentAdminController::class,'updateStatus'])->name('paymentAdmin.update_status');

////////////////////////////////////////////////////
Route::get('/indexAdmin',[\App\Http\Controllers\Admin\PocketController::class,'indexAdmin'])->name('pocketAdmin.index');
Route::get('pocket/change_status/{id}',[\App\Http\Controllers\Admin\PocketController::class,'changeStatus'])->name('pocket.change_status');
Route::post('pocket/update_status/update/{id}',[\App\Http\Controllers\Admin\PocketController::class,'updateStatus'])->name('pocket.update_status');

////end

Route::get('admin/dashboard', [HomeController::class, 'admin'])->name('admin.dashboard');

Route::post('logout', [LoginController::class, 'logout'])->name('logout');



//======================== payment ===========

