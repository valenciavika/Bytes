<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Menu;
use App\Models\MenuDetail;

class MenuDetailController extends Controller
{
    public function show($id, $tenant_name, $menu_id) { 
        $menu = Menu::where('id', $menu_id)->get();

        return view('/main_content.menudetail', [
            'page_title' => 'Menu | BinusEats',
            'active_number' => 0,
            'tenant_name' => $tenant_name,
            'menu_name' => $menu[0]->name,
            'menu_price' => $menu[0]->price,
            'menu_stock' => $menu[0]->stock,
            'menu_jenis' => $menu[0]->jenis
        ])->with('id', $id);
    }
}