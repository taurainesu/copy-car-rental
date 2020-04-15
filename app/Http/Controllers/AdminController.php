<?php

namespace App\Http\Controllers;

use App\Car;

use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{   


    public function makeAdmin(Request $request){
        $data=$request->all();
        $email=$data['email'];
        $last_tab='3/c';

        $user= User::where('email',$email )->first();
        $user->makeAdministrator();

        return redirect()->route('admin')->with('last_tab', $last_tab); 

    }
    
    public function index(Request $request)
    { 
        
        
        
        
       



        $reservations=Reservation::all();
        $cars = Car::withTrashed()
                ->get();
        $users=User::all();

        return view('admin',['reservations'=>$reservations,
                                'cars'=>$cars,
                                'users'=>$users,
                                'home'=>false,
                                'vehicles'=>false,
                                'register'=>false,
                                'admin'=>true,
                                'my_reservation'=>false,]);
    

    }

        
}
