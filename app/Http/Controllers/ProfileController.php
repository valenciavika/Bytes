<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Money;
use App\Models\TopUp;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id) {
        return view('main_content.profile', [
            'page_title' => 'Profile | BinusEats',
            'active_number' => 4,
            'user' => User::find($id),
            'emoneys' => TopUp::all(),
            'moneys' => Money::where('user_id', $id)->get(),
        ])->with('id', $id);
    }

    private function updateUser($user_id, $name, $email, $phone_num) {
        $user = User::find($user_id);

        if($name){
            $user->name = $name;
        }
        if($email){
            $user->email = $email;
        }
        if($phone_num){
            $user->phone = $phone_num;
        }

        $user->save();
    }


    public function editProfile(Request $request, $user_id)
    {
        $validation = $request->validate([
            'fullname' => 'max:255',
            'email' => 'email:dns|max:255|unique:users',
            'phonenumber' => 'min:5|max:255',
        ]);

        
        $fullname = null;
        $email = null;
        $phone_num = null;
        
        if ($validation['fullname'] != 'tempInputName') {
            $fullname = $validation['fullname'];
        }
        
        if ($validation['email'] != 'tempInputEmail@gmail.com') {
            $email = $validation['email'];
        }
        
        if ($validation['phonenumber'] != '0123456') {
            $phone_num = $validation['phonenumber'];
        }
        
        // dd($validation, $fullname, $email, $phone_num);
        // $fullname = $request->input('fullname');
        // $email = $request->input('email');
        // $phone_num = $request->input('phonenumber');
        // dd($fullname);


        $this->updateUser($user_id, $fullname, $email, $phone_num);
        return redirect()->back()->with('success', 'Edit Profile successful');
    }
}
