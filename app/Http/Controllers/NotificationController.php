<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function show($id) {
        return view('main_content.notification', [
            'page_title' => 'Notification | BinusEats',
            'active_number' => 1,
        ])->with('id', $id);
    }
}
