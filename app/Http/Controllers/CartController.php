<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show() {
        return view('main_content.cartpage', [
            'page_title' => 'Cart | BinusEats'
        ]);
    }
}
