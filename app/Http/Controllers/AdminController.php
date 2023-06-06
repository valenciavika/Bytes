<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;

class AdminController extends Controller
{
    public function show($id) {

        return view('admin', [
            'page_title' => 'Admin | BinusEats',
            'active_number' => 1,
            // 'notifications' => Notification::all()
        ])->with('id', $id);
    }
}
