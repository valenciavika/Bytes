<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use App\Models\Menu;
use App\Models\Order;

class TenantHistoryController extends Controller
{
    public function show($id) {

        $order = Order::latest()->whereHas('menu', function($query) use ($id) {
            $query->where('tenant_id', $id);
        })->get();

        return view('tenant_page.tenant_content.tenant_history', [
            'page_title' => 'History | BinusEats',
            'active_number' => 1,
            'dropdown_status' => 2,
            'orders' => $order,
            'menus' => Menu::where('tenant_id', $id)->get()
        ])->with('id', $id);
    }
}
