<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Car;
use App\Http\Controllers\PaymentsController;
use Faker\Provider\ar_SA\Payment;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
use Paynow\Payments\Paynow;




class ReservationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
   
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    protected $paynow = "";

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
            $number = "";
            $data['payment_status']="Pending";
            $id = Auth::id();
            $paymentResponse = "";
            $onemoney= "";
            $ecocash="";
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
                $paymentResponse = $this->pay($ecocash,"ecocash");
                unset($data['ecocash']);
            }

            else{

                unset($data['ecocash']); 
            }


            if(isset($data['onemoney'])){
                        $onemoney=$data['onemoney'];
                        $paymentResponse = $this->pay($onemoney,"onemoney");
                        unset($data['onemoney']);
                    }

                    else{
                        unset($data['onemoney']);
                    }


                    if(isset($data['other'])){
                        $other=$data['other'];
                        $paymentResponse = $this->pay("","other");
                        unset($data['other']);
                    }

                    else{
                        unset($data['other']);
                    }
                    
                   
            
                    if($paymentResponse->success()) {
                        // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
                        $link = $paymentResponse->redirectUrl();
            
                        $pollUrl = $paymentResponse->pollUrl();

                        Reservation::create($data);

                        if($onemoney == "" && $ecocash == ""){
                            return redirect($link);
                        }

                        else{
                            $status = $this->paynow->pollTransaction($pollUrl);
                            
                            if($status->paid()){
                                dd($status);
                            }

                            else{
                                return redirect(route("view_reservations"));
                            }
                        }
                        
                        //dd($link);
                    }


        // if(isset($reservation_id)){


        //     try{
        //         DB::table('reservations')->where('id',$reservation_id)->delete();
        //         }catch(ModelNotFoundException $e){

        //             return redirect()->route('home');
        //         }
        // }


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

    protected function pay($number,$option)
    {

        $response = "";

        $paynow = new Paynow('9071','58939c88-b602-4a04-b1d4-105402e603b9','http://localhost:3000/reservations',
            // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
            'http://example.com/return?gateway=paynow'
        );

        $paynow->setResultUrl('http://localhost:3000/reservations');
        # $paynow->setReturnUrl('');

        $payment = $paynow->createPayment('Invoice 35', 'mkunadavy@gmail.com');

        $payment->add('Car Rental from 02/04/2020 to 03/04/2020', 1.25);

        if($option === "ecocash"){
            $response = $paynow->sendMobile($payment,$number,"ecocash");
        }

        else if($option === "onemoney"){
            $response = $paynow->sendMobile($payment,$number,"onemoney");
        }

        else{
            $response = $paynow->send($payment);
        }
    
        $this->paynow = $paynow;

        return $response;
    }

    // public function checkPayment(){
    //     // Check the status of the transaction
    //     $status = $paynow->pollTransaction($pollUrl);
            
    //     //dd($status->paid());

    //     if($status->paid()){
    //         return redirect("/reservations");
    //     }

    //     else{
    //         return redirect()->route("view_reservations");
    //     }

    //     if($option === "other"){
    //         return redirect($link);
    //     }
    // }
}