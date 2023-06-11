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
use App\Http\Controllers\TenantTransactionController;
use App\Http\Controllers\TenantHistoryController;
use App\Http\Controllers\TenantHomeController;


Route::middleware('web')->get('/', function () {
    return redirect('/login');
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/signout', [LoginController::class, 'signout']);

Route::get('/signup', [SignUpController::class, 'index'])->middleware('guest');;
Route::post('/signup', [SignUpController::class, 'store']);

Route::get('/forgotpass', function () {return view('forgotpass_verif.forgot');})->middleware('guest');;
Route::post('/forgotpass', function () {return redirect('/verification');});

Route::get('/{id}/homepage', [HomeMenuController::class, 'home'])->name('home.index')->middleware('auth');


Route::get('/verification', function () {return view('forgotpass_verif.verification');});
Route::post('/verification', function () {return redirect('/inputnp');});

Route::get('/inputnp', function () {return view('forgotpass_verif.inputnp');});

// Route::get('/topup', [TopUpController::class, 'show']);
Route::get('/{id}/topup/BiPay/{type}', [TopUpController::class, 'activeBiPay'])->middleware('auth');
Route::get('/{id}/topup/OVO/{type}', [TopUpController::class, 'activeOvo'])->middleware('auth');
Route::get('/{id}/topup/GoPay/{type}', [TopUpController::class, 'activeGoPay'])->middleware('auth');
Route::post('/topup/process', [TopUpController::class, 'processTopUp'])->name('topup.process');

Route::get('/{id}/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
Route::post('{user_id}/profile/edit', [ProfileController::class, 'editProfile'])->name('edit.profile');
Route::post('{id}/profile/edit_profile_image', [ProfileController::class, 'editProfileImage']);

Route::get('/{id}/order', [OrderController::class, 'show'])->middleware('auth');
Route::get('/{id}/order/confirm_pickup', [OrderController::class, 'confirmPickup'])->middleware('auth');
Route::get('/{id}/cart', [CartController::class, 'show'])->middleware('auth');

Route::get('/{id}/cart/order_now', [CartController::class, 'store'])->middleware('auth');
Route::get('/{id}/edit_notes', [CartController::class, 'saveEdit']);

Route::get('/{id}/menu/{tenant_name}', [MenuController::class, 'show'])->middleware('auth');
Route::get('/{id}/menu_detail/{tenant_name}/{menu_id}', [MenuDetailController::class, 'show'])->middleware('auth');
Route::get('/{id}/menu_detail/add_to_cart', [MenuDetailController::class, 'store'])->middleware('auth');

Route::get('/{id}/notification', [NotificationController::class, 'show'])->middleware('auth');
Route::get('/{id}/notification/change_status', [NotificationController::class, 'changeStatus'])->middleware('auth');

Route::get('/{id}/tenant/transaction', [TenantTransactionController::class, 'show']);
Route::get('/{id}/tenant/history', [TenantHistoryController::class, 'show']);
Route::get('/{id}/tenant/homepage', [TenantHomeController::class, 'show'])->middleware('auth');
Route::get('/{id}/tenant/finish_order/{trans_id}', [TenantTransactionController::class, 'finishOrder']);