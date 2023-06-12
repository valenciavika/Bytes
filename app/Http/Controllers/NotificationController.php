<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class NotificationController extends Controller
{
    public function show($id) {
        $notif = Notification::where("user_id", $id)->get()->sortByDesc('time');
        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);
        $count_notif = count($notif);

        return view('user_page.main_content.notification', [
            'page_title' => 'Notification | BinusEats',
            'active_number' => 1,
            'notifications' => $notif,
            'unread_notif_count' => $unread_notif_count,
            'count_notif' => $count_notif,
        ])->with('id', $id);
    }

    public function changeStatus(Request $request, $id)
    {
        $notif_id = $request->input('notif_id');
        $this->updateStatus($notif_id);
        
    }

    private function updateStatus($notif_id)
    {
        $notif = Notification::where("id", $notif_id)->first();
        $notif->clicked_status = 2;
        $notif->save();
    }
}
