<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ChangePassword extends Controller
{
    public function ShowPassword(){

        return view('admin.reset-password');
    }

    public function UpdatePassword(Request $request){

        $request->validate([

            'old_password' => 'required',
            'password' =>'required|confirmed'
        ]);

        $auth_password = Auth::user()->password;

        if(Hash::check($request->old_password, $auth_password)){

            $user = User::find(Auth::id());
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->back()->with('success', 'Your password has been updated.');

        }else{

            return redirect()->back()->with('error', 'Invalid password.');
        }
    }

    public function ShowProfile(){

        // if(Auth::user()){

            $user = User::find(Auth::id());

            // if($user){

                return view('admin.user-profile', compact('user'));

        //     }

        // }

    }

    public function UpdateProfile(Request $request){

        $user = User::find(Auth::id());

        // if($user){

           $user->name = $request->name;
           $user->email = $request->email;
           $user->save();

           $notification = array(

            'message' => 'Profile Updated Successfully.',
            'alter-type' => 'success'


           );

           return redirect()->back()->with($notification);

        // }

    }
}
