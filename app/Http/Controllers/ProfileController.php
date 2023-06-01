<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Money;
use App\Models\TopUp;

class ProfileController extends Controller
{
    public function show($id) {
        return view('main_content.profile', [
            'page_title' => 'Profile | BinusEats',
            'active_number' => 4,
            'emoneys' => TopUp::all(),
            'moneys' => Money::all()
        ])->with('id', $id);
    }
}
