<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Paynow\Http\ConnectionException;
use Paynow\Payments\Paynow;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class Payment extends Model
{
    //
        protected $guarded = [];

        public function reservation (){
            return $this->belongsTo("App\Reservation");
        }

        public static function store($reservation,$payment_method){
            $payment = Payment::create([
                'reservation_id' => $reservation->id,
                'poll_url' => "",
                'mode' => $payment_method,
                'amount'=>$reservation->total_cost,
            ]);

            return $payment;
        }


        public function setStatusAttribute($value){
            $this->attributes['status'] = strtolower($value);
            $this->save();
            return $this;
        }


        public  function initialisePaynow($reservation_id){
            $paynow = new Paynow('9071','58939c88-b602-4a04-b1d4-105402e603b9','http://localhost:8000/reservation/view/'.$reservation_id,'google.com' );
            
            //$paynow = new Paynow("6668", "b0b170e0-c950-4800-b56c-9ce4e4e02e14",'https://www.google.com','google.com' );

            return $paynow;  
        }

	    public function addPayment($paynow,$amount,$car){
	        $payment = $paynow->createPayment('Invoice '.rand(000000,999999), Auth::user()->email);
		    $payment->add($car->brand." ".$car->model.' Rental from '.$car->startDate.' to '.$car->endDate,$amount);
		    return $payment;
		}

        public static function sendPaynow($paynow,$payment,$mobile_number,$option){

            if($option == "Other"){
                try{                            
                    $response = $paynow->send($payment);
                }

                catch(ConnectionException $e){
                    $response="connection_error"; 
                }
            }

            else{
                try{
                    $response = $paynow->sendMobile($payment,$mobile_number,$option);
                }

                catch(ConnectionException $e){
                    $response="connection_error";        
                }
            }

            return $response;
        }

	public function setPollUrlAtrribute($value){
        	$this->attributes['poll_url'] = $value;
        	$this->save();
                        }

    public  function pay($number,$option,$amount,$car,$reservation_id){
        try{
            $paynow=$this->initialisePaynow($reservation_id);
            $payment=$this->addPayment($paynow,$amount,$car);
            $response=$this->sendPaynow($paynow,$payment,$number,$option);

            if($response != "connection_error"){
                if ($response->success()){
                    $link = $response->redirectUrl();
                    $pollUrl = $response->pollUrl();
                    //  set the poll url 
                    $this->setPollUrlAtrribute($pollUrl);

                    return $link;
                }

                else {
                    return "connection_error";
                }
            }

            else {
                return "connection_error";
            }
        }               
        catch(ConnectionException $e){
            return "connection_error"; } 

        }
}



       



        
