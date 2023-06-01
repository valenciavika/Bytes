<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index() {
        return view('login_signup.login',[
            'page_title' => 'Login | BinusEats',
        ]);
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email'=> 'required|email:dns',
            'password' => 'required'
        ]);

        // dd($user);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where("email", $credentials['email'])->first();
            $user_id = $user->id;
            // dd($user_id);
            return redirect()->intended('/homepage/'.$user_id);
        }

        return back()->with('LoginError', 'Login Failed!');
    }
}
