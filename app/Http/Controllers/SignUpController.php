<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SignUpController extends Controller
{
    public function index() {
        return view('login_signup.signup',[
            'title' => 'Sign Up'
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

        User::create($validation);
        return redirect('/login')->with('success', 'Registration successfull! Please login');
    }
}
