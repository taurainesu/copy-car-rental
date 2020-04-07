<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Paynow\Http\ConnectionException;
use Paynow\Payments\Paynow;

class Payment extends Model
{
    //


        protected $guarded = [];

        public function reservation (){


            return $this->belongsTo("App\Reservation");
        }


        public static function store($reservation){

                $payment = Payment::create(
                    [
                        'reservation_id' => $reservation->id,
                        'poll_url' => "",
                                                                ]);


                return $payment;
                                 }


    

        public function setStatusAttribute($value)
                {
                    $this->attributes['status'] = strtolower($value);
                }


        


        public  function initialisePaynow(){

                $paynow = new Paynow('9071','58939c88-b602-4a04-b1d4-105402e603b9','google.com','google.com' );
                $payment = $paynow->createPayment('Invoice 35', 'mkunadavy@gmail.com');
                $payment->add('Car Rental from 02/04/2020 to 03/04/2020', 1.25);
                return $payment;  
                        }




        public static function sendPaynow($paynow,$payment,$mobile_number,$option){


                if($option=="other"){

                        try{
                                $response = $paynow->send($payment);
                            }
                
                        catch(ConnectionException $e){
                                return redirect()->route('home'); }
                                                     } 
                else{

                        try{

                                $response = $paynow->sendMobile($payment,$mobile_number,$option);
                            }

                        catch(ConnectionException $e){
                            
                                $response="connection_error";

                                                    }

       
        
                return $response;
                                }




                                                                     }



    public function setPollUrlAtrribute($value){
        $this->attributes['poll_url'] = $value;
        $this->save();
                        }

        public  function pay($number,$option)
    {

       
        $paynow=$this->initialisePaynow();
        $response = "";

        
       
        try{





            
        

        

       
    
        if($response->success()) {
            // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
            $link = $response->redirectUrl();

            $pollUrl = $response->pollUrl();

            // Check the status of the transaction
            return $pollUrl;
           }
        }

        catch(ConnectionException $e){
            return redirect()->route('home'); }

        
    }




    
    }



       



        