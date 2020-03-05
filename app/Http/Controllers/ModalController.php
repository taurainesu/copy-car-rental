<?php

namespace App\Http\Controllers;

use App\Car;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    
    public function pop_modal(Request $request, $id)
    {  

        $car = Car::findOrFail($id);

       return view('modal',["car" => $car
       ]);
    }

}
