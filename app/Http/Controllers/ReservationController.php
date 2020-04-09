<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Car;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;


class ReservationController extends Controller{
    /**
     * Create a new controller instance.
     *
     * @return void
   
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

        public function save_data(Request $request){   

                $data = $request->all();
                $payment_method=$data['payment_method'];
                unset($data['payment_method']);
                if(isset($data['reservation_id'])){
                        $reservation_id=$data['reservation_id'];
                        unset($data['reservation_id']);
                                                        }
                else{
                        unset($data['reservation_id']);
                            }           


                if(isset($data['phone_number'])){
                        $phone_number=$data['phone_number']; 
                        unset($data['phone_number']);
                                                }

                else{

                        unset($data['phone_number']); 
                             }


                $start_date=new Carbon($data['pick_up_date']);
                $end_date=new Carbon($data['return_date']);
                $car_id=$data['car_id'];
                $car = Car::findOrFail($car_id);
                $available=$car->is_free($start_date,$end_date);
                $data['pick_up_date']=$start_date;
                $data['return_date']=$end_date;
                if ($available){
                        $reservation=$car->reserve($data,$start_date,$end_date);
                        $payment=Payment::store($reservation,$payment_method);
                        $paynow=$payment->pay($phone_number,$payment_method);
                        
                        if(isset($reservation_id)){
                                try{
                                    DB::table('reservations')->where('id',$reservation_id)->delete();}
                                    
                                catch(ModelNotFoundException $e){
                                    return redirect()->route('home'); }
                                                     }

                return redirect()->route('view_reservation',['id' => $reservation->id]);
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
                'my_reservation'=>true, ]);

                                                         }


        public function view_reservation(Request $request,$id){
                $reservation=Reservation::findOrFail($id);
                return view('reservation',["reservation" => $reservation]);}

        public function update_reservation(Request $request,$id){

                $reservation=Reservation::findOrFail($id);
                $data=$request->all();
                $data['pick_up_date']=new Carbon($data['pick_up_date']);
                $data['return_date']=new Carbon($data['return_date']);

                $days=$data['pick_up_date']->floatDiffInDays($data['return_date']);
                $data['total_cost']=$days*$reservation->car->daily_rate;
                if (isset($data['payment_method'])){
                        $payment_method=$data['payment_method'];
                        $phone_number=$data['phone_number'];
                       // $payment=Payment::store($reservation,$payment_method);
                     //   $paynow=$payment->pay($phone_number,$payment_method);


                }

                
                $reservation=$reservation->updateReservation($data);

                return view('reservation',["reservation"=>$reservation]);

                                                                 }


}
