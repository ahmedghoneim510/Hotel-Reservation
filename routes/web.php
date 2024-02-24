<?php

use App\Http\Controllers\Front\HotelController;
use App\Http\Controllers\Payment\PaypalController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\HomeContoller;
use App\Http\Controllers\Front\BookingContorller;
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

Route::get('/', [HomeContoller::class,'index']);
/*-------------------------------------------------------------------------*/
Route::get('/home', [HomeContoller::class,'index'])->name('home');
Route::get('hotel/about-us',[HomeContoller::class,'aboutUs'])->name('aboutUs');
Route::get('hotel/services',[HomeContoller::class,'services'])->name('services');
Route::get('hotel/contacts',[HomeContoller::class,'contacts'])->name('contacts');
/*--------------------------------------------------------------------------*/
Route::get('/hotel/{id}', [HotelController::class,'show'])->name('hotel');
Route::get('/hotel/room/{id}', [HotelController::class,'showDetail'])->name('hotel.room');
Route::post('/hotel/room-booking/{id}', [HotelController::class,'roomBooking'])->name('hotel.room.booking');
/*---------------------------------paypal----------------------------------------*/
Route::middleware('auth')->group(function (){
    Route::get('/payment/{id}', [PaypalController::class,'handlePayment'])
        ->name('hotel.payment')->middleware('Payment');
    Route::get('paypal/payment/cancel', [PaypalController::class,'paymentCancel'])->name('payment.cancel');
    Route::get('paypal/payment/success', [PayPalController::class, 'paymentSuccess'])->name('payment.success');

});
/*-------------------------------Order Details------------------------------------------*/

Route::get('user/booking',[BookingContorller::class,'index'])->name('user.booking')->middleware('auth');

/*-------------------------------------------------------------------------*/

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/dashboard.php';
require __DIR__.'/auth.php';
