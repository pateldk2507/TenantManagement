<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

class TenantGoogleController extends Controller
{
    public function loginwithgoogle(){
        return Socialite::driver('google')->redirect();
     }
     public function callbackFromGoogle(){
        try {
            $user = Socialite::driver('google')->stateless()->user();

           //  dd($request);
            $is_user = User::where('email', $user->getEmail())->where('userType', '0')->first();
            dd($is_user);
            if(!$is_user){
            $saveUser = User::updateOrCreate([
               'google_id' => $user->getId(),
            ],[
               'name' => $user->getName(),
               'email' => $user->getEmail(),
               'imageURL' => $user->getAvatar(),
               'userType' => "0",            
               'password' => Hash::make($user->getName(). "@" . $user->getId())
            ]);
           }else{
               $is_user = User::where('email', $user->getEmail())->update([
                   'google_id' => $user->getId(),
                   'userType' => "0",
               ]);
               $saveUser = User::where('email', $user->getEmail())->first();
           }

            Auth::loginUsingId($saveUser->id);
            Session::put('LoggedUserGmail', $user);
           return redirect()->route('tenant.home');

        } catch (\Throwable $th) {
            throw $th;
        }
    }

}
