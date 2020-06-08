<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use Session;
use Redirect;
use DB;
use Hash;

class LoginController extends Controller
{
    public function index() {

        return view('customauth.login');
     }
     public function store(Request $request) {
  
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);
        $user = DB::table('users')->where('email', $request->email)->first();
  
        if ($user->email === $request->email) {
          return redirect('/home');
        } else {
          return back()->with('error', 'Your credentials dont match our records');
        }
  
      }

    public function logout(Request $request)
    {
        Session::flush();
		return Redirect::to('/login');

    }

    public function socialLogin()
   {
       return Socialite::driver('facebook')->redirect();
   }

   public function handleProviderCallback()
   {
       $userSocial = Socialite::driver('facebook')->user();
       $user = User::where(['email' => $userSocial->getEmail()])->first();
       if($user){
           $this->store($user);
           return redirect('/home');
       }
    }
}
