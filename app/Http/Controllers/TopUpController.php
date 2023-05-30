<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TopUp;
use App\Models\TopUpPaymentMethod;
use App\Models\TopUpTransaction;
use App\Models\Money;

class TopUpController extends Controller
{
    public function show() {
        return view('main_content.topup', [
            'page_title' => 'Topup | BinusEats',
        ]);
    }

    public function activeBiPay($id){
        $user = User::find($id);
        $emoney = TopUp::where("id", 1)->get();
        $money = Money::where("emoney_id", 1)->get();
        $method = TopUpPaymentMethod::all();
        $transaction = TopUpTransaction::where("user_id", $id)->get();
        $transaction_emoney = TopUp::all();

        foreach($transaction as $tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
        }


        // dd($transaction);
        // dd($money);

        return view('main_content.topup', [
            'page_title' => 'Topup | BinusEats',
            'active' => "TopUpBiPay",
            'user' => $user,
            'emoney' => $emoney,
            'money' => $money,
            'method' => $method,
            'transaction' => $transaction,
            'tr_emone' => $transaction_emoney,
            'active_number' => 0
        ]);
    }

    public function activeOvo($id){
        $user = User::find($id);
        $emoney = TopUp::where("id", 2)->get();
        $money = Money::where("emoney_id", 2)->get();
        $method = TopUpPaymentMethod::all();
        $transaction = TopUpTransaction::where("user_id", $id)->get();
        $transaction_emoney = TopUp::all();

        foreach($transaction as $tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
        }


        // dd($transaction);
        // dd($money);

        return view('main_content.topup', [
            'page_title' => 'Topup | BinusEats',
            'active' => "TopUpBiPay",
            'user' => $user,
            'emoney' => $emoney,
            'money' => $money,
            'method' => $method,
            'transaction' => $transaction,
            'tr_emone' => $transaction_emoney,
            'active_number' => 0
        ]);
    }

    public function activeGoPay($id){
        $user = User::find($id);
        $emoney = TopUp::where("id", 3)->get();
        $money = Money::where("emoney_id", 3)->get();
        $method = TopUpPaymentMethod::all();
        $transaction = TopUpTransaction::where("user_id", $id)->get();
        $transaction_emoney = TopUp::all();

        foreach($transaction as $tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
        }


        // dd($transaction);
        // dd($money);

        return view('main_content.topup', [
            'page_title' => 'Topup | BinusEats',
            'active' => "TopUpBiPay",
            'user' => $user,
            'emoney' => $emoney,
            'money' => $money,
            'method' => $method,
            'transaction' => $transaction,
            'tr_emone' => $transaction_emoney,
            'active_number' => 0
        ]);
    }
}
