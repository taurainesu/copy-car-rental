<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Payment;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Car;
use Paynow\Payments\Paynow;
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


        public function paymentsTest(Request $request){
                $data = $request->all();

                $car = Car::find($data['car_id']);

                $paynow = new Paynow('9071','58939c88-b602-4a04-b1d4-105402e603b9','/','/' );

                $payment = $paynow->createPayment('Invoice '.rand(1,99),"mkunadavy@gmail.com");

                $payment->add('Renting a '.$car->manufacturer." ".$car->model, $data['amount']);

                $response = $paynow->send($payment);

                if($response->success()) {
                // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
                        $link = $response->redirectUrl();

                        $pollUrl = $response->pollUrl();


                // Check the status of the transaction
                        $status = $paynow->pollTransaction($pollUrl);

                        return redirect($link);

                }
        }


        public function save_data(Request $request){
                $data = $request->all();

                $payment_method=$data['payment_method'];
                $amount = $data['amount'];
                $currency = $data['currency'];

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
                        $phone_number=07711111111;
                        unset($data['phone_number']);
                             }

                unset($data['amount']);

                $currency = $data['currency'];

                unset($data['currency']);

                $car_id=$data['car_id'];
                $car = Car::findOrFail($car_id);
                $start_date=new Carbon($data['pick_up_date']);
                $end_date=new Carbon($data['return_date']);
                $available=$car->is_free($start_date,$end_date);

                $carModify = $car;

                $carModify->startDate =  $data['pick_up_date'];
                $carModify->endDate = $data['return_date'];


                $data['pick_up_date']=$start_date;
                $data['return_date']=$end_date;


                if ($available){
                        $reservation=$car->reserve($data,$start_date,$end_date);
                        $payment=Payment::store($reservation,$payment_method,$amount,$currency);
                        $link = "connection_error";

                        if($currency == "ZWL"){
                                $link=$payment->pay($phone_number,$payment_method,$amount,$carModify,$reservation->id);
                        }

                        if(isset($reservation_id)){
                                try{
                                        DB::table('reservations')->where('id',$reservation_id)->delete();
                                }

                                catch(ModelNotFoundException $e){
                                        return redirect()->route('home'); }
                                }

                if($link != "connection_error"){
                        if ($payment_method=="Other"){

                                return redirect($link);
                        }

                        else{
                                return redirect()->route('view_reservation',['id' => $reservation->id]);

                        }
                }

                else{
                        $reservation->delete();
                        return redirect()->back()->with('status', 'cant redirect to paynow check your internet connection');
                }




                                    }


                else{

                        return redirect()->back()->with('reservation_status', 'vehicle is reseved in this period please pick another');

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
                'my_reservation'=>false, ]);

                                                         }


        public function my_reservations(Request $request){
                 $user_id = Auth::id();
                $reservations = Reservation::with(['car' => function ($query) use($user_id) {
                    $query->where('user_id',$user_id);}])->get();
                return view('suppliers.myreservations',[
                "reservations" => $reservations,
                'home'=>false,
                'vehicles'=>false,
                'register'=>false,
                'my_reservation'=>true, ]);

                                                         }


        public function view_reservation(Request $request,$id){
                $reservation=Reservation::findOrFail($id);
                return view('reservation',["reservation" => $reservation]);}


        public function view_supplier_reservation(Request $request ,$id){

            $reservation=Reservation::findOrFail($id);
            return view('suppliers.reservation',["reservation"=>$reservation]);
        }

        public function review_reservation(Request $request,$id){

            $reservation=Reservation::findOrFail($id);
            $data=$request->all();
            $reservation->supplier_review($data);
            return view('reservation',["reservation" => $reservation]);

        }

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


                public function approve_reservation($tab,$last,$id){

                        $reservation= Reservation::find($id);
                        $last_tab=$tab.'/'.$last;

                        if(Auth::user()->is_admin){
                                $reservation->approveByAgent();
                                return redirect()->route('admin')->with('last_tab', $last_tab);
                        }

                        else{
                                $reservation->approveByOwner();
                                return redirect()->route('view_reservation',['id' => $reservation->id]);

                        }




                }


                public function rejectReservation($tab,$last,$id ){


                        $reservation= Reservation::find($id);
                        $last_tab=$tab.'/'.$last;
                        $user = Auth::user();
                        if($user->is_admin){
                                $reservation->rejectedByAgent();
                                return redirect()->route('admin')->with('last_tab', $last_tab);
                        }

                        else {
                            $reservation->rejectedByUser();
                            return redirect()->route('view_reservation',['id' => $reservation->id]);
                        }






                }



                public function cancelReservation($tab,$last,$id ){


                        $reservation= Reservation::find($id);
                        $last_tab=$tab.'/'.$last;
                        $user = Auth::user();
                        if($user->is_admin){
                                $reservation->cancelledByAgent();
                        }

                        else {
                            $reservation->cancelledByUser();
                        }



                        return redirect()->route('admin')->with('last_tab', $last_tab);


                }



}
