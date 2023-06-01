<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show($id) {
        return view('main_content.cartpage', [
            'page_title' => 'Cart | BinusEats',
            'active_number' => 2
        ])->with('id', $id);;
    }
}
