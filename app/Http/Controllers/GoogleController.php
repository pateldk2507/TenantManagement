<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use DB;
use Cookie;


class GoogleController extends Controller
{
    public function loginwithgoogle(Request $request){
        return Socialite::driver('google')->redirect();
     }

     public function callbackFromGoogle(){
        try {
             $user = Socialite::driver('google')->stateless()->user(); //Google Response
             $is_user = User::where('email', '=',$user->getEmail())->first();
            Session::put('tempUser', $user);
            return \Redirect::route('landlord.googleFunction');
         } catch (\Throwable $th) {
             throw $th;
         }
     }
}
