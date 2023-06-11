<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Menu;

class MenuController extends Controller
{
    public function show($id, $tenant_name) {
        
        $tenant = Tenant::where("name", $tenant_name)->first();
        return view('/user_page.main_content.menu', [
            'page_title' => 'Menu | BinusEats',
            'active_number' => 0,
            'tenant_name' => $tenant_name,
            'tenant_image' => $tenant->image_link,
            'tenant_desc' => $tenant->description,
            'menus' => Menu::where('tenant_id', $tenant->id)->get(),
            // 'tenant_name' => $tenant->name,
            // 'tenant_img' => $tenant->img,
            // 'menu' => Menu::where('id', $tenant_id)
        ])->with('id', $id);
    }
}