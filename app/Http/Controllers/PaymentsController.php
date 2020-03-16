<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paynow\Payments\Paynow;

class PaymentsController extends Controller
{
    public function pay($data)
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

        if(!empty($data["ecocash"])){
            $response = $paynow->sendMobile($payment,$data['ecocash'],"ecocash");
            dd($response);
        }

        else if(!empty($data["onemoney"])){
            $response = $paynow->sendMobile($payment,$data['onemoney'],"onemoney");
            dd($response);
        }

        else{
            $response = $paynow->send($payment);
        }

        dd($response);
    
        if($response->success()) {
            // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
            $link = $response->redirectUrl();

            $pollUrl = $response->pollUrl();

            // Check the status of the transaction
            $status = $paynow->pollTransaction($pollUrl);
            
            if($status->paid()){
                return redirect("/reservations");
            }

            if(!empty($data['others'])){
                return redirect($link);
            }
           
        }
    
    }
}
