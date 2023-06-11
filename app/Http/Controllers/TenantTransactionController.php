<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Tenant;
use App\Models\Transaction;
use Carbon\Carbon;

class TenantTransactionController extends Controller
{
    public function show($id) {

        $transactions = Transaction::latest()->whereHas('menu', function($query) use ($id) {
            $query->where('tenant_id', $id);
        })->get();

        return view('tenant_page.tenant_content.tenant_transaction', [
            'page_title' => 'Admin | BinusEats',
            'active_number' => 1,
            'transactions' => $transactions,
            'dropdown_status' => 1,
            'menus' => Menu::where('tenant_id', $id)->get()
        ])->with('id', $id);

    }

    public function finishOrder($id, $trans_id) {

        $transaction = Transaction::find($trans_id);
        $time = Carbon::now()->timezone('Asia/Jakarta');
        $tenant = Tenant::find($id);

        Notification::create([
            'title' =>'Your order is ready to be picked up!',
            'description' => 'Your order at '. $tenant->name .' is ready, you can pick up your order at the cafeteria.',
            'type' => 'ready',
            'clicked_status' => true,
            'user_id' => $transaction->user_id,
            'time'=> now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);

        Order::insert([
            'menu_id' => $transaction->menu_id,
            'quantity' => $transaction->quantity,
            'additional_description' => $transaction->additional_description,
            'jenis' => $transaction->jenis,
            'user_id' => $transaction->user_id,
            'confirmStatus' => 'not_confirm',
            'time' => $time,
        ]);

        $transaction->delete();

        return back();
    }

}


