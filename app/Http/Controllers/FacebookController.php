<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Socialite;
use App\User;
use Exception;
use Mockery\Expectation;

class FacebookController extends Controller
{
    public function redirectToProvider()
    {
        try{
            return Socialite::driver('facebook')->redirect();
        }catch(Exception $e){
            return redirect("/login");
        }
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        try{
            $user = Socialite::driver('facebook')->user();

            $db = User::where("facebookID",$user->getID())->get()->first();

            if ($db !== null) {
                // Authentication passed...
                auth()->login($db);
                return redirect('/');
            }

            else{
                //create new user
                return view('auth.register')->with(['email'=>$user->getEmail(),'name'=>$user->getName(),'facebookID'=>$user->getID(),'message'=>'User confirmed please complete registration','facebook'=>true]);
            }
        }catch(Exception $e){
            return redirect("/login")->withErrors(["email"=>"Failed to authenticate using Facebook. Please try again"])->with(["facebook"=>true]);
        }
    }
}
