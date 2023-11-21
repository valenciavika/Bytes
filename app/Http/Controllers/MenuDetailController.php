<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tenant;
use App\Models\MenuDetail;
use App\Models\Menu;
use App\Models\Cart;
use App\Models\Notification;
class MenuDetailController extends Controller
{
    public function show($id, $tenant_name, $menu_id) {
        $tenant = Tenant::where("name", $tenant_name)->first();
        $Menu = Menu::where('id', $menu_id)->first();

        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);

        return view('/user_page.main_content.menudetail', [
            'page_title' => 'Menu | Bytes',
            'active_number' => 0,
            'menu' => $Menu,
            'tenant' => $tenant,
            'unread_notif_count' => $unread_notif_count,
            // 'tenant_name' => $tenant->name,
            // 'tenant_img' => $tenant->img,
            // 'tenant_desc' => $tenant->description,
            // 'menu' => Menu::where('id', $tenant_id)
        ])->with('id', $id);
    }

    public function store(Request $request, $id) {
        $menu_id = $request->input('menuId');
        $quantity = $request->input('quantity');
        $additionalDescription = $request->input('additionalDescription');
        $jenis = $request->input('jenis');
        $menu = Menu::where('id', $menu_id)->first();
        $tenant = Tenant::where("id", $menu->tenant_id)->first();


        Cart::insert([
            'menu_id' => $menu_id,
            'quantity' => $quantity,
            'additional_description' => $additionalDescription,
            'jenis' => $jenis,
            'user_id' => $id,
            'created_at' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);

        Notification::insert([
            'title' =>'You have an unpaid order!',
            'description' => "You haven't paid your order at " . $tenant->name . ", please proceed to pay at your shopping cart.",
            'type' => 'unpaid',
            'clicked_status' => 1,
            'user_id' => $id,
            'time'=> now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);
    }
}
