<?php

namespace App\Http\Controllers;

use App\Models\Order;

class OrderController extends Controller
{
    public function show($id) {
        return view('main_content.processing_finish.order', [
            'page_title' => 'Order | BinusEats',
            'active_number' => 3,
            'temp_variable' => 1
        ])->with('id', $id);
    }
}
