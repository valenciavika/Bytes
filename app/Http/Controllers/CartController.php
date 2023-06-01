<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Tenant;
use App\Models\Menu;
use App\Models\TopUp;
use App\Models\Money;

class CartController extends Controller
{
    public function show($id) {
        return view('main_content.cartpage', [
            'page_title' => 'Cart | BinusEats',
            'active_number' => 2,
            'carts' => Cart::latest()->get(),
            'tenants' => Tenant::all(),
            'menus' => Menu::all(),
            'emoneys' => TopUp::all(),
            'moneys' => Money::all()
        ])->with('id', $id);;
    }

    
}
