<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class TenantHomeController extends Controller
{
    public function show($id) {

        return view('tenant_page.tenant_content.tenant_homepage', [
            'page_title' => 'Admin Home | BinusEats',
            'active_number' => 1,
            // 'notifications' => Notification::all()
        ])->with('id', $id);
    }
}