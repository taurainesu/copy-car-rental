<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Paynow\Payments\Paynow;

class PaymentController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
   
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */


    public function initiate(){


    }
    public static function poll(Request $request) { 
        
            $data=$request->all();
            $id=$data['id'];
            $reservation=Reservation::findOrFail($id);
            $payment=$reservation->payment;
            $poll_url=$reservation->payment->poll_url;
            $paynow = new Paynow('9071','58939c88-b602-4a04-b1d4-105402e603b9','google.com','google.com' );
            $status = $paynow->pollTransaction($poll_url);
            if($status->status()=="paid"){
                  
                  $payment=$payment->setStatusAttribute("paid");
                  return response()
                  ->json(['status'=> 'paid'])
                  ->withCallback($request->input('callback'));
                  
              }

            elseif($status->status()=="cancelled"){
                  $payment=$payment->setStatusAttribute("paid");
                  return response()
                  ->json(['status'=> 'cancelled'])
                  ->withCallback($request->input('paid'));
                  
            }

            elseif ($status->status()=="disputed") {
                  $payment=$payment->setStatusAttribute("disputed");
                  return response()
                        ->json(['status'=> 'disputed'])
                        ->withCallback($request->input('callback'));
            }

            elseif ($status->status()=="refunded") {
                  $payment=$payment->setStatusAttribute("refunded");
                  return response()
                        ->json(['status'=> 'refunded'])
                        ->withCallback($request->input('callback'));
                  
            }


            elseif ($status->status()=="created") {
                  $payment=$payment->setStatusAttribute("created");
                  return response()
            ->json(['status'=> 'created'])
            ->withCallback($request->input('callback'));
                  
            }

            else{

                  return response()
                  ->json(['status'=> 'error'])
                  ->withCallback($request->input('callback'));


            }
             
            
              
              
                  }

    }
