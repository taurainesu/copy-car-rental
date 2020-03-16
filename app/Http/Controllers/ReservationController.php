<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Car;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;




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
            if(isset($data['reservation_id'])){
                        $reservation_id=$data['reservation_id'];
                        unset($data['reservation_id']);
                                                }
            else{
                unset($data['reservation_id']);
                }


            if(isset($data['ecocash'])){
                $ecocash=$data['ecocash'];
                unset($data['ecocash']);
                                        }

            else{

                unset($data['ecocash']); 
            }


            if(isset($data['onemoney'])){
                        $onemoney=$data['onemoney'];
                        unset($data['onemoney']);
                    }
            else{
                unset($data['onemoney']);
            }


            if(isset($data['other'])){
                $other=$data['other'];
                unset($data['other']);
                                        }
            else{
                unset($data['other']);
            }


            

            Reservation::create($data);
        if(isset($reservation_id)){


            try{
                DB::table('reservations')->where('id',$reservation_id)->delete();
                }catch(ModelNotFoundException $e){

                    return redirect()->route('home');
                }
        }


            


            
        

           return redirect()->route('home');


        }


        else{
             return"vehicle is reseved in this period please pick another";

        }

        
    }


    public function get_reservations(Request $request){

        $user_id = Auth::id();
        $reservations=Reservation::where('user_id', $user_id)->get();
        return view('reservations',[
            "reservations" => $reservations,
            'home'=>false,
            'vehicles'=>false,
            'register'=>false,
            'my_reservation'=>true,
            ]);

    }


    public function view_reservation(Request $request,$id){

        
        $reservation=Reservation::findOrFail($id);
        return view('reservation',["reservation" => $reservation]);

    }

    public function update_reservation(Request $request,$id){

        
        $reservation=Reservation::findOrFail($id);
        $reservation->setStatusAttribute('hanging');
        $car=$reservation->car;
        $reservation->save();
        return view('modal',["reservation"=>$reservation,"car" => $car]);

    }
}