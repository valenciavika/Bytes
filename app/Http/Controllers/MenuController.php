<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function show($tenant_id) {
        $tenant = Tenant::where('id', $tenant_id);
        
        return view('menu', [
            'tenant_name' => $tenant->name,
            'tenant_img' => $tenant->img,
            'tenant_desc' => $tenant->description,
            'menu' => Menu::where('id', $tenant_id)
        ]);
    }
}
