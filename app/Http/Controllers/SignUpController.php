<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Money;

class SignUpController extends Controller
{
    public function index() {
        return view('login_signup.signup',[
            'page_title' => 'Signup | BinusEats',
        ]);
    }

    public function store(Request $request) {
        $validation = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|max:255|unique:users',
            'password' => 'required|min:5|max:255',
            'confirm_password' => 'required|same:password',
            'checkbox' => 'required'
        ]);

        $validation['password'] = Hash::make($validation['password']);
        $validation['phone'] = null;

        User::create($validation);

        $user = User::where("email", $validation['email'])->first();
        $user_id = $user->id;

        Money::insert([
            [
                'emoney_id' => 1,
                'user_id' => $user_id,
                'totalAmount' => 0,
            ],
            [
                'emoney_id' => 2,
                'user_id' => $user_id,
                'totalAmount' => 0,
            ],
            [
                'emoney_id' => 3,
                'user_id' => $user_id,
                'totalAmount' => 0,
            ]
        ]);
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
