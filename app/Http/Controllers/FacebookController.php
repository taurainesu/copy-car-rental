<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {

        $user = Socialite::driver('facebook')->user();

        $db = User::where("facebookID",$user->getID())->get()->first();

        if ($db !== null) {
            // Authentication passed...
            auth()->login($db);
            return redirect()->intended('/');
        }
    
        else{
            //create new user
            return view('auth.register',)->with(['email'=>$user->getEmail(),'name'=>$user->getName(),'facebookID'=>$user->getID(),'message'=>'Complete registration']);
        }
    }
}
