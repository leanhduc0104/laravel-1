<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
})->name('a');
Route::get('cartproduct/{product}', [CartController::class, 'showproduct'])->name('cart.product');
Route::post('cartadd', [CartController::class, 'addCart'])->name('cart.addcart');
Route::get('cartitems', [CartController::class, 'showCartItems'])->name('cart.showCartItems');
Route::get('home', [HomeController::class, 'show'])->name('home');
Route::post('delete', [CartController::class, 'delete']);
Route::middleware(['guest'])->group(function(){
    Route::get('register', [RegisterUserController::class, 'create'])->name('user.register');
    Route::post('register', [RegisterUserController::class, 'store'])->name('user.create');
    Route::post('login', [UserController::class, 'check'])->name('user.check');
    Route::get('login',[UserController::class, 'create'])->name('user.login');
    Route::get('forgot_password', [UserController::class, 'form'])->name('user.forgot.password.form');
    Route::post('forgot_password', [UserController::class, 'resetPass'])->name('user.forgot.password.link');
});
Route::get('logout', [UserController::class , 'logout'])->name('logout');
Route::get('reset_password/{token}', [UserController::class, 'showResetForm'])->name('user.reset.password.form');
Route::post('/password/reset',[UserController::class,'resetPassword'])->name('user.reset.password');
Route::view('cart', 'cart.home');


