<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function show($id) {

        return view('main_content.notification', [
            'page_title' => 'Notification | BinusEats',
            'active_number' => 1,
            'notifications' => Notification::all()
        ])->with('id', $id);
    }
}
