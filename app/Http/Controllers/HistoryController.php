<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class HistoryController extends Controller
{
    public function show($id) {

        return view('history', [
            'page_title' => 'History | BinusEats',
            'active_number' => 1,
            // 'notifications' => Notification::all()
        ])->with('id', $id);
    }
}
