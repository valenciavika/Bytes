<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show() {
        return view('main_content.profile', [
            'page_title' => 'Profile | BinusEats',
            'active_number' => 4
        ]);
    }
}
