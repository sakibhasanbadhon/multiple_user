<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

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



    Route::get('customer/dashboard',function(){
        return view('page.customer.dashboard');
    })->name('customer.dashboard');



});




Auth::routes([
    'register'         => false,
    'password.confirm' => false,
    'password.email'   => false,
    'password.request' => false,
    'password.reset'   => false,
    'password.update'  => false,
    'signin'           => false
]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//================ Authentication ========================//

Route::get('signup', [AuthController::class, 'signupShowForm']);
Route::post('signup.store', [AuthController::class, 'signupStore'])->name('signup.store');
Route::get('signin', [AuthController::class, 'signin'])->name('signin');
Route::get('forgot-password', [AuthController::class, 'forgotPassword']);

