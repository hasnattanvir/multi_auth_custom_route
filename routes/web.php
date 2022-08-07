<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Doctor\DoctorController;
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
});
Auth::routes();
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// User
Route::prefix('user')->name('user.')->group(function(){

    //PreventBackHistory user kore hoyca jate kore logout na howa porjonto back dia abar logine jaite na para
    Route::middleware(['guest:web','PreventBackHistory'])->group(function(){
        Route::view('/login', 'dashboard.user.login')->name('login');
        Route::view('/register', 'dashboard.user.register')->name('register');
        Route::post('/create',[UserController::class,'create'])->name('create');
        Route::post('/check',[UserController::class,'check'])->name('check');
    });

    Route::middleware(['auth:web','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.user.home')->name('home');
        Route::get('/logout',[UserController::class, 'logout'])->name('logout');
    });

});

// Admin
Route::prefix('cadmin')->name('admin.')->group(function(){
    Route::middleware(['guest:admin','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.admin.login')->name('login');
        Route::post('/check',[AdminController::class,'check'])->name('check');
    });

    Route::middleware(['auth:admin','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.admin.home')->name('home');
        Route::get('/logout',[AdminController::class,'logout'])->name('logout');
    });
});

// Doctor
Route::prefix('doctor')->name('doctor.')->group(function(){
    Route::middleware(['guest:doctor','PreventBackHistory'])->group(function(){
        Route::view('/login','dashboard.doctor.login')->name('login');
        Route::view('/register', 'dashboard.doctor.register')->name('register');
        Route::post('/create',[DoctorController::class,'create'])->name('create');
        Route::post('/check',[DoctorController::class,'check'])->name('check');
    });

    Route::middleware(['auth:doctor','PreventBackHistory'])->group(function(){
        Route::view('/home','dashboard.doctor.home')->name('home');     
        Route::get('/logout',[DoctorController::class, 'logout'])->name('logout');
    });
});

