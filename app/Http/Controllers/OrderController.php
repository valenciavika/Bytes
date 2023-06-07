<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Menu;
use App\Models\Tenant;

class OrderController extends Controller
{
    public function show($id) {
        return view('main_content.processing_finish.order', [
            'page_title' => 'Order | BinusEats',
            'active_number' => 3,
            'temp_variable' => 1,
            'transactions' => Transaction::all(),
            'orders' => Order::all(),
            'menus' => Menu::all(),
            'tenants' => Tenant::all()
        ])->with('id', $id);
    }
}
