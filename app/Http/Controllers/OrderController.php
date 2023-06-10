<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Transaction;
use App\Models\Menu;
use App\Models\Tenant;

class OrderController extends Controller
{
    public function show($id) {
        $transactions = Transaction::where('user_id', $id)->get();
        $orders = Order::where('user_id', $id)->get();

        if($transactions){
            foreach($transactions as $o){
                $o->expected_clock = date('H:i', strtotime($o->expected_time));
            }
        }

        return view('user_page.main_content.processing_finish.order', [
            'page_title' => 'Order | BinusEats',
            'active_number' => 3,
            'temp_variable' => 1,
            'transactions' => $transactions,
            'orders' => $orders,
            'menus' => Menu::all(),
            'tenants' => Tenant::all()
        ])->with('id', $id);
    }
}
