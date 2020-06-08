<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Illuminate\Support\Str;
use Mail;

class RegisterController extends Controller
{
    public function index() {
      
        return view('customauth.register');
     }
 
     public function store(Request $request) {
       $request->validate([
           'name' => 'required|string|max:255',
           'email' => 'required|string|email|max:255|unique:users',
           'password' => 'required|string|min:8|confirmed',
           'password_confirmation' => 'required',
       ]);
 
       $register = new User;
 
       $register->name = $request->name;
       $register->email = $request->email;
       $register->password = $request->password;
 
       $register->save();

       $token = Str::random(64);

       Mail::send('customauth.verify', ['token' => $token], function($message) use($request){
        $message->to($request->email)->subject('Reset Password Notification')->from('hello@example.com');
    });


    return redirect()->back()->with('message', 'We have e-mailed your password reset link!');
    // return redirect('/login');
 
     }
}
