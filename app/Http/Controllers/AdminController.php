<?php

namespace App\Http\Controllers;

use App\Car;

use App\User;
use App\Reservation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
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
        $date=Carbon::now();


        return view('admin',['reservations'=>$reservations,
                                'cars'=>$cars,
                                'users'=>$users,
                                'date'=>$date,
                                'home'=>false,
                                'vehicles'=>false,
                                'register'=>false,
                                'admin'=>true,
                                'my_reservation'=>false,]);


    }


    public  function vehicle_report($option){
        if ($option=="daily"){
            $date=Carbon::today();
            $now=Carbon::now();
            $users=User::whereMonth('created_at',$date)->get();
            $car=Car::whereDate('created_at', $date)->get();
            $deleted=Car::onlyTrashed()->whereDate('deleted_at',$date)->get();
            $rejected=Car::whereDate('updated_at',$date)->where('status','rejected')->get();
            return view('vehicle_report',['slug'=>"Daily",
                                        'date'=>$now,
                                        'car'=>$car,
                                        'users'=>$users,
                                        'deleted'=>$deleted,
                                        'rejected'=>$rejected,]);
        }

      elseif ($option=="monthly"){


            $date=Carbon::today();
            $now=Carbon::now();
            $month=$now->toArray();
            $month=$month["month"];
            $users=User::whereMonth('created_at',$month)->get();
            $car=Car::whereMonth('created_at', $month)->get();
            $deleted=Car::onlyTrashed()->whereMonth('deleted_at',$month)->get();
            $rejected=Car::whereDate('updated_at',$date)->where('status','rejected')->get();
            return view('vehicle_report',['slug'=>"Monthly",
                                        'date'=>$now,
                                        'car'=>$car,
                                        'users'=>$users,
                                        'deleted'=>$deleted,
                                        'rejected'=>$rejected]);
        }


       else {
            $date=Carbon::now();
            return view('vehicle_report',['date'=>$date]);
        }




    }
public function reservation_report($option){

    if($option=="daily"){
        $reservations=Reservation::all();
        $date=Carbon::now();
        $slug="Daily";
    return view('reservation_report',['slug'=>$slug,'date'=>$date,'reservations'=>$reservations]);


    }

    elseif ($option=="monthly") {
        $reservations=Reservation::all();
        $date=Carbon::now();
        $slug="Monthly";
        return view('reservation_report',['slug'=>$slug,'date'=>$date,'reservations'=>$reservations]);

    }


}

}
