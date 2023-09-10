<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class FacebookController extends Controller
{
    //This function to redirect user to the facebook sign in page
    public function facebookPage() 
    {
        
        return Socialite::driver('facebook')->redirect();
    }

    // This function is responsible to handel the call-back url of facebook authentication
    public function facebookredirect() 
    {
        try{

            $facebook_user = Socialite::driver('facebook')->user();

            //check if the user in the database or not
            $user = User::where('facebook_id', $facebook_user->getId())->first();

            //If user doesn't exists in the database -> create new user
            if(!$user){

                $new_user = User::create([
                    'name' => $facebook_user->getName(),
                    'email' => $facebook_user->getEmail(),
                    'facebook_id' => $facebook_user->getId()
                ]);

                Auth::login($new_user);

                return redirect()->intended('dashboard');

            }
            //If user exists in the database
            else{

                Auth::login($user);

                return redirect()->intended('dashboard');

            }

        } catch(\Throwable $th){

            dd('Something went wrong! ' . $th->getMessage());

        }
    }
}
