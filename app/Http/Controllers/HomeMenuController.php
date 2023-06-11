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
use App\Http\Controllers\Controller;
use Carbon\Carbon;


class HomeMenuController extends Controller
{
    public function home($id)
    {
        // dd($user_id);
        $today = Carbon::now('Asia/Jakarta')->format('Y-m-d');
        $tr = Transaction::where('user_id', $id)->whereDate('time', $today)->orderBy('time', 'desc')->first();
        $orders = Order::where('user_id', $id)->whereDate('time', $today)->orderBy('time', 'desc')->first();
        // dd($tr);
        if($tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
            $tr->transaction_day = date('l', strtotime($tr->time));
        }
        if($orders){
            $orders->date= date('d F Y', strtotime($orders->time));
            $orders->time = date('H:i', strtotime($orders->time));
            $orders->day = date('l', strtotime($orders->time));
        }

        // dd($tr->transaction_time);

        return view('/user_page.main_content.homepage', [
            'page_title' => 'BinusEats',
            'active_number' => 0,
            'tenant_category' => Tenant_category::all(),
            'tenant' => Tenant::latest()->filter(request(['search', 'category']))->get(),
            'menu' => Menu::all(),
            'emoneys' => TopUp::all(),
            'moneys' => Money::where("user_id", $id)->get(),
            'id' => $id,
            'transactions' => $tr,
            'orders' => $orders,

        ])->with('id', $id);
    }
}
