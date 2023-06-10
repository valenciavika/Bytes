<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class TenantHistoryController extends Controller
{
    public function show($id) {

        return view('tenant_page.tenant_content.tenant_history', [
            'page_title' => 'History | BinusEats',
            'active_number' => 1,
            // 'notifications' => Notification::all()
        ])->with('id', $id);
    }
}
