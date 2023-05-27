<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\Tenant_category;
use App\Http\Controllers\Controller;

class HomeMenuController extends Controller
{
    public function home()
    {

        return view('/main_content.homepage', [
            'tenant_category' => Tenant_category::all(), 
            'tenant' => Tenant::latest()->filter(request(['search', 'category']))->get(),
            'menu' => Menu::all()
        ]);
    }

    
}
