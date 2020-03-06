<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Car;



class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
   
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function save_data(Request $request)
    {   

        
        //
        $data = $request->all();
        $mydate= Carbon::now();
        $start_date=new Carbon($data['pick_up_date']);
        $end_date=new Carbon($data['return_date']);
        $car_id=$data['car_id'];
        $car = Car::findOrFail($car_id);
        $reservations=$car->reservations;
        

        
        $test=$car->is_free($start_date,$end_date);

        if ($test){
            $data['payment_status']="Pending";
            $id = Auth::id();
            $data['user_id']=$id;
            $days=$start_date->floatDiffInDays($end_date);
            $cost_per_day=$car->daily_rate*$days;
            $total_cost=$days*$cost_per_day;
            $data['total_cost']=$total_cost;
            $data['daily_rate']=$car->daily_rate;

            Reservation::create($data);
            return redirect()->route('home');


        }


        else{
             return"vehicle is reseved in this period please pick another";

        }

        
    }


    public function get_reservations(Request $request){

        $user_id = Auth::id();
        $reservations=Reservation::where('user_id', $user_id)->get();
        return view('reservations',["reservations" => $reservations]);

    }


    public function view_reservation(Request $request,$id){

        
        $reservation=Reservation::findOrFail($id);
        return view('reservation',["reservation" => $reservation]);

    }
}