<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\SignUpController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\HomeMenuController;

Route::get('/homepage/{id}', [HomeMenuController::class, 'home'])->name('home.index');

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/signup', [SignUpController::class, 'index']);
Route::post('/signup', [SignUpController::class, 'store']);

Route::get('/forgotpass', function () {return view('forgotpass_verif.forgot');});
Route::post('/forgotpass', function () {return redirect('/verification');});

Route::get('/verification', function () {return view('forgotpass_verif.verification');});
Route::post('/verification', function () {return redirect('/inputnp');});

Route::get('/inputnp', function () {return view('forgotpass_verif.inputnp');});

// Route::get('/topup', [TopUpController::class, 'show']);
Route::get('/{id}/topup/BiPay/{type}', [TopUpController::class, 'activeBiPay']);
Route::get('/{id}/topup/OVO/{type}', [TopUpController::class, 'activeOvo']);
Route::get('/{id}/topup/GoPay/{type}', [TopUpController::class, 'activeGoPay']);
Route::post('/topup/process', [TopUpController::class, 'processTopUp'])->name('topup.process');

Route::get('/profile/{id}', [ProfileController::class, 'show']);
Route::get('/order/{id}', [OrderController::class, 'show']);
Route::get('/cart/{id}', [CartController::class, 'show']);

