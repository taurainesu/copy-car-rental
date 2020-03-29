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
            $poll_url=$reservation->payments->poll_url;
            
            $paynow = new Paynow('9071','58939c88-b602-4a04-b1d4-105402e603b9','google.com','google.com' );

            $status = $paynow->pollTransaction($poll_url);

            if($status->paid()){

                  return response()
                  ->json(['status'=> 'paid'])
                  ->withCallback($request->input('callback'));
                  
              }

            else{

                  return response()
                  ->json(['status'=> 'failed'])
                  ->withCallback($request->input('callback'));
                  
            }

            
              
              
                  }

    }