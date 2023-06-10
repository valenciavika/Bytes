<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Transaction;

class TenantTransactionController extends Controller
{
    public function show($id) {

        return view('tenant_page.tenant_content.tenant_transaction', [
            'page_title' => 'Admin | BinusEats',
            'active_number' => 1,
            'transactions' => Transaction::where('')
        ])->with('id', $id);
    }
}
