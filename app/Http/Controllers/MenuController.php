<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show($tenant_id) {
        $tenant = Tenant::where('id', $tenant_id);
        
        return view('menu', [
            'page_title' => 'Menu | BinusEats',
            'tenant_name' => $tenant->name,
            'tenant_img' => $tenant->img,
            'tenant_desc' => $tenant->description,
            'menu' => Menu::where('id', $tenant_id)
        ]);
    }
}
