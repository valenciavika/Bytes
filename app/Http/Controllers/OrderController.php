<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show() {
        return view('main_content.order', [
            'page_title' => 'Order | BinusEats',
            'active_number' => 3
        ]);
    }
}
