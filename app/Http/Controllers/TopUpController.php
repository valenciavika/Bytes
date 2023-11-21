<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\TopUp;
use App\Models\TopUpPaymentMethod;
use App\Models\TopUpTransaction;
use App\Models\Money;
use App\Models\Notification;

class TopUpController extends Controller
{
    public function show() {

        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);

        return view('main_content.topup', [
            'page_title' => 'Topup | Bytes',
            'unread_notif_count' => $unread_notif_count,
        ]);
    }

    public function activeBiPay($id, $type){
        $user = User::find($id);
        $emoney = TopUp::where("id", 1)->get();
        $money = Money::where("emoney_id", 1)->get();
        $method = TopUpPaymentMethod::all();
        $transaction = TopUpTransaction::where("user_id", $id)->get()->sortByDesc('time');
        $transaction_emoney = TopUp::all();


        foreach($transaction as $tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
            $tr->transaction_day = date('l', strtotime($tr->time));
        }

        foreach($money as $m){
            $m->formattedPrice = number_format($m->totalAmount, 0, ',', '.');
        }
        // dd($transaction);
        // dd($money);

        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);

        return view('user_page.main_content.topup', [
            'page_title' => 'Topup | BinusEats',
            'active' => 1,
            'user' => $user,
            'emoney' => $emoney,
            'money' => $money,
            'method' => $method,
            'transaction' => $transaction,
            'tr_emone' => $transaction_emoney,
            'active_number' => 0,
            'type' => $type,
            'unread_notif_count' => $unread_notif_count,
        ])->with('id', $id);
    }

    public function activeOvo($id, $type){
        $user = User::find($id);
        $emoney = TopUp::where("id", 2)->get();
        $money = Money::where("emoney_id", 2)->get();
        $method = TopUpPaymentMethod::all();
        $transaction = TopUpTransaction::where("user_id", $id)->get()->sortByDesc('time');
        $transaction_emoney = TopUp::all();

        foreach($transaction as $tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
            $tr->transaction_day = date('l', strtotime($tr->time));
        }

        foreach($money as $m){
            $m->formattedPrice = number_format($m->totalAmount, 0, ',', '.');
        }

        // dd($transaction);
        // dd($money);

        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);

        return view('user_page.main_content.topup', [
            'page_title' => 'Topup | BinusEats',
            'active' => 2,
            'user' => $user,
            'emoney' => $emoney,
            'money' => $money,
            'method' => $method,
            'transaction' => $transaction,
            'tr_emone' => $transaction_emoney,
            'active_number' => 0,
            'type' => $type,
            'unread_notif_count' => $unread_notif_count,
        ])->with('id', $id);
    }

    public function activeGoPay($id, $type){
        $user = User::find($id);
        $emoney = TopUp::where("id", 3)->get();
        $money = Money::where("emoney_id", 3)->get();
        $method = TopUpPaymentMethod::all();
        $transaction = TopUpTransaction::where("user_id", $id)->get()->sortByDesc('time');
        $transaction_emoney = TopUp::all();

        foreach($transaction as $tr){
            $tr->transaction_date= date('d F Y', strtotime($tr->time));
            $tr->transaction_time = date('H:i', strtotime($tr->time));
            $tr->transaction_day = date('l', strtotime($tr->time));
        }

        foreach($money as $m){
            $m->formattedPrice = number_format($m->totalAmount, 0, ',', '.');
        }

        // dd($transaction);
        // dd($money);

        $unread_status = Notification::where("user_id", $id)->where("clicked_status", 1)->get();
        $unread_notif_count = count($unread_status);

        return view('user_page.main_content.topup', [
            'page_title' => 'Topup | BinusEats',
            'active' => 3,
            'user' => $user,
            'emoney' => $emoney,
            'money' => $money,
            'method' => $method,
            'transaction' => $transaction,
            'tr_emone' => $transaction_emoney,
            'active_number' => 0,
            'type' => $type,
            'unread_notif_count' => $unread_notif_count,
        ])->with('id', $id);
    }

    private function updateUser($user_id, $emoney_id, $amount) {
        $money = Money::where('user_id', $user_id)->get();
        foreach($money as $m){
            if($m['emoney_id']==$emoney_id){
                $m->totalAmount += $amount;
                $m->save();
                break;
            }
        }
    }

    public function processTopUp(Request $request)
    {
        $amount = $request->input('amount');
        $paymentMethod = $request->input('payment_method');
        $user_id = $request->input('user_id');
        $emoney_id = $request->input('emoney_id');

        TopUpTransaction::insert([
            'emoney_id' => $emoney_id,
            'user_id' => $user_id,
            'amount' => $amount,
            'payment_id' => $paymentMethod,
            'method' => "Top Up",
            'time' => now()->timezone('Asia/Jakarta')->format('Y-m-d H:i:s'),
        ]);

        $this->updateUser($user_id, $emoney_id, $amount);

        return redirect()->back()->with('success', 'Top-up successful');
    }


}
