<?php

namespace App\Http\Controllers;

use App\Car;

use App\User;
use App\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    
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
