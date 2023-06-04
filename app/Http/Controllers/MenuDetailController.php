<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\MenuDetail;

class MenuDetailController extends Controller
{
    public function show() {
       // $tenant = Tenant::where('id', $tenant_id);
        
        return view('/main_content.menudetail', [
            'page_title' => 'Menu | BinusEats',
            // 'tenant_name' => $tenant->name,
            // 'tenant_img' => $tenant->img,
            // 'tenant_desc' => $tenant->description,
            // 'menu' => Menu::where('id', $tenant_id)
        ]);
    }
}