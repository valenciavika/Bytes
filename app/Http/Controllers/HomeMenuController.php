<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;
use App\Models\tenant_category;
use App\Models\tenant;

class HomeMenuController extends Controller
{
    //
    public function home()
    {
        $tenant_cat = tenant_category::all();
        $tenant = tenant::all();
        return view('welcome', ['tenant_category'=>$tenant_cat, 'tenant'=>$tenant]);
    }
}
