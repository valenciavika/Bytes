<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Money;
use App\Models\TopUp;
use App\Models\Tenant;
use Illuminate\Http\Request;
use App\Models\Tenant_category;
use App\Models\Transaction;
use App\Models\Order;
use App\Models\Notification;
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class HomeMenuController extends Controller
{
    public function home($id)
    {
        // dd($user_id);
        $today = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $tr = Transaction::where('user_id', $id)->whereDate('time', $today)->orderBy('time', 'desc')->first();
        $orders = Order::where('user_id', $id)->where('confirmStatus', 'not_confirm')->whereDate('time', $today)->orderBy('time', 'desc')->first();
        // dd($tr);
        if($tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
            $tr->transaction_day = date('l', strtotime($tr->time));
            $menu_tr = Menu::find($tr->menu_id);
            // dd($menu_tr);
            $tr->menu_name = $menu_tr ->name;
            $tenant_tr = Tenant::find($menu_tr->tenant_id);

            $tr->tenant_name = $tenant_tr->name;
            // dd($tr->tenant_name);
        }
        if(!$orders){
            $orders = Order::where('user_id', $id)->where('confirmStatus', 'confirm')->whereDate('time', $today)->orderBy('time', 'desc')->first();
        }
        if($orders){
            $orders->date= date('d F Y', strtotime($orders->time));
            $orders->time = date('H:i', strtotime($orders->time));
            $orders->day = date('l', strtotime($orders->time));

            $menu_or = Menu::find($orders->menu_id);
            // dd($menu_tr);
            $orders->menu_name = $menu_or ->name;
            $tenant_or = Tenant::find($menu_or->tenant_id);

            $orders->tenant_name = $tenant_or->name;
        }

        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);

        // dd($tr->transaction_time);

        return view('/user_page.main_content.homepage', [
            'page_title' => 'Bytes',
            'active_number' => 0,
            'tenant_category' => Tenant_category::all(),
            'tenant_all' => Tenant::all(),
            'tenant' => Tenant::latest()->filter(request(['search', 'category']))->get(),
            'menu' => Menu::all(),
            'emoneys' => TopUp::all(),
            'moneys' => Money::where("user_id", $id)->get(),
            'id' => $id,
            'transactions' => $tr,
            'orders' => $orders,
            'unread_notif_count' => $unread_notif_count,

        ])->with('id', $id);
    }
}
