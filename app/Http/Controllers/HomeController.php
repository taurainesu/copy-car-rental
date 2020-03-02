<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

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
        return view('index',[
            'cars'=>Car::all(),
            'search'=>Car::all(),
        ]);

        //return view("index");
    }

    public function cars(){
        return view("cars",[
            'search'=>Car::all()
        ]);
    }

}
