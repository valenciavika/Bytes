<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function show($id) {
        $notif = Notification::where("user_id", $id)->get()->sortByDesc('time');
        $count_notif = count($notif);
        // dd($count_notif);
        return view('user_page.main_content.notification', [
            'page_title' => 'Notification | BinusEats',
            'active_number' => 1,
            'notifications' => $notif,
            'count_notif' => $count_notif,
        ])->with('id', $id);
    }


}
