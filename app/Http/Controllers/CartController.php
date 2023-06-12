<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Tenant;
use App\Models\Menu;
use App\Models\TopUp;
use App\Models\Money;
use App\Models\TopUpTransaction;
use App\Models\Transaction;
use App\Models\Notification;
use Carbon\Carbon;

class CartController extends Controller
{
    public function show($id) {
        return view('user_page.main_content.cartpage', [
            'page_title' => 'Cart | BinusEats',
            'active_number' => 2,
            'carts' => Cart::where('user_id', $id)->get(),
            'tenants' => Tenant::all(),
            'menus' => Menu::all(),
            'emoneys' => TopUp::all(),
            'moneys' => Money::where('user_id', $id)->get(),
        ])->with('id', $id);;
    }

    public function store(Request $request, $id)
    {
        $totalPrice = $request->input('totalPrice');
        $emoneyId = $request->input('emoneyId');
        $quantityArr = $request->input('quantityArr');
        $quantityArr = json_decode($request->input('quantityArr'), true);

        $idArr = $request->input('idArr');
        $idArr = json_decode($request->input('idArr'), true);
        $time = Carbon::now()->timezone('Asia/Jakarta');
        $et = $time->copy()->addMinutes(rand(5, 10));

        $count = 0;
        foreach ($idArr as $i) {
            $cart = Cart::find($i);
            $quantityData = $quantityArr[$count];
            $count += 1;
            Transaction::create([
                'menu_id' => $cart->menu_id,
                'quantity' => $quantityData,
                'additional_description' => $cart->additional_description,
                'jenis' => $cart->jenis,
                'user_id' => $id,
                'time' => $time,
                'expected_time' => $et,
            ]);

            $cart->delete();

            $this->updateMenuStock($cart->menu_id, $quantityData);
        }

        TopUpTransaction::insert([
            'emoney_id' => $emoneyId,
            'user_id' => $id,
            'amount' => $totalPrice,
            'payment_id' => null,
            'method' => "Payment",
            'time' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);

        Notification::insert([
            'title' =>'Your order has been submitted!',
            'description' => 'Thank you for ordering, please wait for the tenant to finish your order!',
            'type' => 'ordersubmitted',
            'clicked_status' => 1,
            'user_id' => $id,
            'time'=> now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);

        $this->updateEmoneyValue($id, $emoneyId, $totalPrice);

        return redirect()->route('{$id)/cart')->with('success', 'Order successful');
    }

    private function updateMenuStock($menu_id, $quantity) {
        $menu = Menu::find($menu_id);
        $menu->stock -= $quantity;
        $menu->save();
    }

    private function updateEmoneyValue($user_id, $emoney_id, $amount) {
        $money = Money::where('user_id', $user_id)->get();
        foreach($money as $m){
            if($m['emoney_id']==$emoney_id){
                $m->totalAmount -= $amount;
                $m->save();
                break;
            }
        }
    }

    public function saveEdit(Request $request, $user_id) {
        $cart_id = $request->input("cart_id");
        $desc = $request->input('item_desc');

        $this->updateAddDesc($cart_id, $desc);
    }

    private function updateAddDesc($cart_id, $desc) {
        $cart = Cart::find($cart_id);
        $cart->additional_description = $desc;
        $cart->save();
    }
}
