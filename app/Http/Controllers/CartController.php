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

class CartController extends Controller
{
    public function show($id) {
        return view('main_content.cartpage', [
            'page_title' => 'Cart | BinusEats',
            'active_number' => 2,
            'carts' => Cart::latest()->get(),
            'tenants' => Tenant::all(),
            'menus' => Menu::all(),
            'emoneys' => TopUp::all(),
            'moneys' => Money::all()
        ])->with('id', $id);;
    }

    public function store(Request $request, $id)
    {
        $totalPrice = $request->input('totalPrice');
        $emoneyId = $request->input('emoneyId');
        $idArr = $request->input('idArr');
        $idArr = json_decode($request->input('idArr'), true);

        foreach ($idArr as $i) {
            $cart = Cart::find($i);
            Transaction::create([
                'menu_id' => $cart->menu_id,
                'quantity' => $cart->quantity,
                'additional_description' => $cart->additional_description,
                'jenis' => $cart->jenis,
            ]);
            
            $cart->delete();
        }

        TopUpTransaction::insert([
            'emoney_id' => $emoneyId,
            'user_id' => $id,
            'amount' => $totalPrice,
            'payment_id' => null,
            'method' => "Payment",
            'time' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);

        $this->updateEmoneyValue($id, $emoneyId, $totalPrice);

        return redirect()->route('{$id)/cart')->with('success', 'Order successful');
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
}
