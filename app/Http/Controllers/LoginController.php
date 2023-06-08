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

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = User::where("email", $credentials['email'])->first();
            $user_id = $user->id;
            return redirect()->intended($user_id.'/homepage/');
        }

        return back()->with('LoginError', 'Login Failed!');
    }

    public function signout(Request $request) {
        Auth::logout();
 
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }
}
