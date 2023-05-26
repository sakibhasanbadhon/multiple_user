<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PasswordForgetController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/backend', function () {
    return view('page.dashboard');
});



Route::prefix('app/')->name('app.')->middleware(['auth','is_provider','provider_switch'])->group(function(){
    // this is dashboard route
    Route::get('/',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('provider',[DashboardController::class, 'provider'])->name('provider');
    Route::post('provider/status',[DashboardController::class, 'status'])->name('provider.status');



    // Route::get('customer/dashboard',function(){
    //     return view('page.customer.dashboard');
    // })->name('customer.dashboard');



});

    Route::prefix('app/')->name('app.')->middleware(['auth'])->group(function(){

        Route::get('customer/dashboard', [CustomerController::class, 'index'])->name('customer.dashboard');

    });

Route::get('customer/verify/{id}',[CustomerController::class, 'customerVerify'])->name('customer.verify');


Route::get('/forget-password',[PasswordForgetController::class, 'forgetPasswordForm'])->name('forget-password.form');
Route::post('/forget-password/store',[PasswordForgetController::class, 'forgetPasswordStore'])->name('forget-password.store');
Route::get('/reset-password/{id}',[PasswordForgetController::class, 'resetPasswordForm'])->name('reset-password.form');
Route::post('/reset-password/store/{id}',[PasswordForgetController::class, 'resetPasswordStore'])->name('reset-password.store');




// Route::get();


Auth::routes();




Auth::routes([
    'register'         => false,
    'password.confirm' => false,
    'password.email'   => false,
    'password.request' => false,
    'password.reset'   => false,
    'password.update'  => false,
    'signin'           => false,
    'verify'           => false,
    'verification.notice'=> false
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//================ Authentication ========================//

Route::get('signup', [AuthController::class, 'signupShowForm']);
Route::post('signup.store', [AuthController::class, 'signupStore'])->name('signup.store');
Route::get('signin', [AuthController::class, 'signin'])->name('signin');
Route::get('forgot-password', [AuthController::class, 'forgotPassword']);


