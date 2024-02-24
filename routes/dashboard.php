<?php


use App\Http\Controllers\Dashboard\BookingsController;
use App\Http\Controllers\Dashboard\HotelsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AuthController;
use App\Http\Controllers\Dashboard\HomeController;
use App\Http\Controllers\Dashboard\AdminsController;
use App\Http\Controllers\Dashboard\RoomsController;
//Route::get('/admin/register',[AuthController::class,'registerView'])->name('admin.register');
//Route::post('/admin/register',[AuthController::class,'register'])->name('admin.register');
Route::get('/admin/login',[AuthController::class,'loginView'])->name('admin.login');
Route::post('/admin/login',[AuthController::class,'login'])->name('admin.login');
Route::post('/admin/logout',[AuthController::class,'logout'])->name('admin.logout');


Route::group(['middleware' => 'auth:admin',
    'as' => 'admin.',
    'prefix' =>'admin/dashboard'
    ], function () {

    Route::get('/',[HomeController::class,'index'])->name('dashboard');
    Route::resource('/admins', AdminsController::class);
    Route::resource('/hotels', HotelsController::class);
    Route::resource('/rooms',RoomsController::class);
    Route::resource('/bookings',BookingsController::class)->except('create','store','show','edit','update');
});
