<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;

class ForgotpassController extends Controller
{
    public function showForgotPass() {
        return view('forgotpass_verif.forgot');
    }

    public function showVerif() {
        return view('forgotpass_verif.verification');
    }

    public function showChangePassword() {
        return view('forgotpass_verif.inputnp');
    }

    public function getEmail(Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(64);
        DB::table('password_reset')->insert(
            ['email'=>$request->email,
            'token'=>$token,
            'created_at'=>Carbon::now()]
        );

        $link = route('/inputnp', ['token'=>$token, 'email'=>$request->email]);
        $body = "Please click the link below to reset your password";

        Mail::send('email-forgot',['action-link' => $link, 'body'=>$body], function($message) use ($request) {
            $message->from('binuseats@example.com', 'BinusEats');
            $message->to($request->email, 'Your Name')->subject('Rest Password');
        });

        return back()->with('success', 'Email sent successfully');
    }

    public function sendEmail() {

    }

    public function changePassword() {

    }
}
