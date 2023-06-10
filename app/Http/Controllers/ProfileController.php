<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;


use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Money;
use App\Models\TopUp;
use App\Models\User;

class ProfileController extends Controller
{
    public function show($id) {
        return view('user_page.main_content.profile', [
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
        $validator = Validator::make($request->all(), [
            'fullname' => 'max:255',
            'email' => 'email:dns|max:255|unique:users,email,' . $user_id,
            'phonenumber' => 'max:13|unique:users,phone,' . $user_id,
        ]);

        if ($validator->fails()) {
            return redirect()->route('profile', $user_id)->withErrors($validator)->withInput();
        }

        $user = User::find($user_id);
        // dd($user);

        $fullname = null;
        $email = null;
        $phone_num = null;
        $validation = $validator->validated();

        if ($validation['fullname'] != $user['name']) {
            $fullname = $validation['fullname'];
        }

        if ($validation['email'] != $user['email']) {
            $email = $validation['email'];
        }

        if ($validation['phonenumber'] != $user['phone']) {
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

    public function editProfileImage(Request $request, $user_id) {

        $validation = $request->validate([
            'image' => 'image|file'
        ]);

        $prev_image = explode('/', $request->prev_image)[2];
        

        $image_link = 'storage/'.$request->file('image')->store('user_profile_images');

        if ($prev_image != "default_profile_image.png") {
            Storage::delete('user_profile_images/'.$prev_image);
        }

        $this->updateImage($user_id, $image_link);
        
        // return back();
    }

    private function updateImage($user_id, $image_link) {
        $user = User::where('id', $user_id)->first();
        $user->image_link = $image_link;
        $user->save();
    }
}
