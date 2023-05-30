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

Route::get('/', [HomeMenuController::class, 'home']);

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/signup', [SignUpController::class, 'index']);
Route::post('/signup', [SignUpController::class, 'store']);


Route::get('/forgotpass', function () {return view('forgotpass_verif.forgot');});
Route::post('/forgotpass', function () {return redirect('/verification');});

Route::get('/verification', function () {return view('forgotpass_verif.verification');});
Route::post('/verification', function () {return redirect('/inputnp');});

Route::get('/inputnp', function () {return view('forgotpass_verif.inputnp');});

Route::get('/topup', [TopUpController::class, 'show']);

Route::get('/profile', [ProfileController::class, 'show']);
Route::get('/order', [OrderController::class, 'show']);
Route::get('/cart', [CartController::class, 'show']);
