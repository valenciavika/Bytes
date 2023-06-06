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
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MenuDetailController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HistoryController;


Route::get('/{id}/homepage', [HomeMenuController::class, 'home'])->name('home.index');

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

Route::get('/{id}/profile', [ProfileController::class, 'show'])->name('profile');
Route::post('{user_id}/profile/edit', [ProfileController::class, 'editProfile'])->name('edit.profile');

Route::get('/{id}/order/', [OrderController::class, 'show']);
Route::get('/{id}/cart', [CartController::class, 'show']);

Route::get('/{id}/cart/order_now', [CartController::class, 'store']);

Route::get('/{id}/menu/{tenant_name}', [MenuController::class, 'show']);
Route::get('/{id}/menu_detail/{tenant_name}/{menu_id}', [MenuDetailController::class, 'show']);
Route::get('/{id}/menu_detail/add_to_cart', [MenuDetailController::class, 'store']);

Route::get('/{id}/notification', [NotificationController::class, 'show']);

Route::get('/{id}/admin', [AdminController::class, 'show']);
Route::get('/{id}/history', [HistoryController::class, 'show']);