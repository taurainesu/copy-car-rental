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
            $data['daily_rate']=1;
            $data['cost_per_day']=1;
            $data['reservation_status']="pending";

            Reservation::create($data);
            return redirect()->route('home');


        }


        else{
             return"vehicle is reseved in this period please pick another";

        }

        
    }
}