<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Paynow\Payments\Paynow;

class PaymentsController extends Controller
{
    public function pay()
    {
        $paynow = new Paynow('6668','b0b170e0-c950-4800-b56c-9ce4e4e02e14','http://example.com/gateways/paynow/update',
            // The return url can be set at later stages. You might want to do this if you want to pass data to the return url (like the reference of the transaction)
            'http://example.com/return?gateway=paynow'
        );

        $paynow->setResultUrl('http://localhost:3000/');
        # $paynow->setReturnUrl('');

        $payment = $paynow->createPayment('Invoice 35', 'melmups@outlook.com');

        $payment->add('Sadza and Beans', 1.25);

        $response = $paynow->send($payment);

        if($response->success()) {
            // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
            $link = $response->redirectUrl();

            $pollUrl = $response->pollUrl();


            // Check the status of the transaction
            $status = $paynow->pollTransaction($pollUrl);
            
            if($status){
                return redirect($link);
            }
        }
    }
}
