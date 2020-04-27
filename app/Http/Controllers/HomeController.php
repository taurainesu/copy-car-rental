<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home',[
            'cars'=>Car::all(),
            'search'=>Car::all(),
            'home'=>true,
            'vehicles'=>false,
            'register'=>false,
            'my_reservation'=>false,
        ]);

        //return view("index");
    }

    public function cars(){
        return view("cars",[
            'search'=> Car::join("suppliers","suppliers.id","cars.user_id")
            ->select("cars.*","suppliers.id as supplier_id")
            ->where('cars.status','approved')->get(),
            'home'=>false,
            'vehicles'=>true,
            'register'=>false,
            'my_reservation'=>false,
        ]);
    }

}
