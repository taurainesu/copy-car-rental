<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vehicle;

class CarController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {  
        $data=$request->all();

        if($files = $request->file('imageUrl')){
            $destination = 'images/cars/';
            $carImage = time().".".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl']);
            $data['imageUrl'] ='/images/cars/'.$carImage;
        }
    
        Vehicle::create($data);
        return redirect()->route('home');
    }

    public function index(){
        return view("new_car");
    }

    public function cars(){
        return Vehicle::all();
    }

    public function car($id){
        return view("car_info",[
            "car" => Vehicle::find($id)
            ]
        );
    }

    public function search(Request $request){
        $params = $request->all();
        return Vehicle::where("type",$params['carType'])->where("location",$params['location'])->get();
    }
}
