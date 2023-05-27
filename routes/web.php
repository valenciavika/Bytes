<?php

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SignUpController;

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
