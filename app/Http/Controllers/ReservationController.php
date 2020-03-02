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

        function is_availabe($reservations,$start_date,$end_date) {
            
            global $available;
            $available=true;
            foreach($reservations as $res){
                
                $res_start=new Carbon($res->pick_update);
                $res_end=new Carbon($res->return_date);
                $start_test=$start_date->between($res_start, $res_end);
                $end_test=$start_date->between($res_start, $res_end);

                $available = ($start_test || $end_test) ? false : true;

                

                if (!$available) {
                     break ;
                                }

                
                }

                return $available;



                }
        //
        $data = $request->all();
        $mydate= Carbon::now();
        $start_date=new Carbon($data['pick_up_date']);
        $end_date=new Carbon($data['return_date']);
        $car_id=$data['car_id'];
        $car = Car::findOrFail($car_id);
        $reservations=$car->reservations;
        

        
        $test=is_availabe($reservations,$start_date,$end_date);

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
            return redirect()->route('mk,m');

        }

        
    }
}