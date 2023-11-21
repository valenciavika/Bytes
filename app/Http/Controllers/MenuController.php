<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\Menu;
use App\Models\Notification;

class MenuController extends Controller
{
    public function show($id, $tenant_name) {

        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);

        $tenant = Tenant::where("name", $tenant_name)->first();
        return view('/user_page.main_content.menu', [
            'page_title' => 'Menu | Bytes',
            'active_number' => 0,
            'tenant_name' => $tenant_name,
            'tenant_image' => $tenant->image_link,
            'tenant_desc' => $tenant->description,
            'menus' => Menu::where('tenant_id', $tenant->id)->get(),
            'unread_notif_count' => $unread_notif_count,
            // 'tenant_name' => $tenant->name,
            // 'tenant_img' => $tenant->img,
            // 'menu' => Menu::where('id', $tenant_id)
        ])->with('id', $id);
    }
}
