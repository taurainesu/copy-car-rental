<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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

        if($files = $request->file('imageUrl1')){
            $destination = 'images/cars/';
            $carImage = time().".".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl1']);
            $data['imageUrl1'] ='/images/cars/'.$carImage;
        }

        if($files = $request->file('imageUrl2')){
            $destination = 'images/cars/';
            $carImage = time().".".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl2']);
            $data['imageUrl2'] ='/images/cars/'.$carImage;
        }


        if($files = $request->file('imageUrl3')){
            $destination = 'images/cars/';
            $carImage = time().".".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl3']);
            $data['imageUrl3'] ='/images/cars/'.$carImage;
        }


        if($files = $request->file('imageUrl4')){
            $destination = 'images/cars/';
            $carImage = time().".".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl4']);
            $data['imageUrl4'] ='/images/cars/'.$carImage;
        }


        $data['user_id'] = Auth::id();
    
        Car::create($data);
        return redirect()->route('home');
    }

    public function index(){
        return view("new_car");
    }

    public function cars(){
        return Car::all();
    }

    public function car($id){
        return view("car_info",[
            "car" => Car::find($id)
            ]
        );
    }

    public function search(Request $request){
        $params = $request->all();

        $reserved = null;
        $notReserved = null;
        $other = DB::table("Cars")->orWhere("type",$params['carType'])->orWhere("location",$params['location'])->get();

        $start = $params["pickUpDate"];
        $end = $params["dropOffDate"];
        $location = $params['location'];
        $type = $params['carType'];

        $result = "";

        if($start != null && $end != null){

            if(!empty($location) && !empty($type)){
                $reserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNotBetween("reservations.pick_up_date",[$start,$end])
                ->where("location",$location)
                ->where("type",$type)
                ->whereNotBetween("reservations.return_date",[$start,$end])
                ->get();

                $notReserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNull("reservations.pick_up_date")
                ->where("location",$location)
                ->where("type",$type)
                ->whereNull("reservations.return_date")
                ->get();

                $result = $reserved->toBase()->merge($notReserved->toBase());
            }

            else if(!empty('location')){
                $reserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNotBetween("reservations.pick_up_date",[$start,$end])
                ->where("location",$location)
                ->whereNotBetween("reservations.return_date",[$start,$end])
                ->get();

                $notReserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNull("reservations.pick_up_date")
                ->where("location",$location)
                ->whereNull("reservations.return_date")
                ->get();

                $result = $reserved->toBase()->merge($notReserved->toBase());
            }

            else if(!empty($type)){
                $reserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNotBetween("reservations.pick_up_date",[$start,$end])
                ->where("type",$type)
                ->whereNotBetween("reservations.return_date",[$start,$end])
                ->get();

                $notReserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNull("reservations.pick_up_date")
                ->where("type",$type)
                ->whereNull("reservations.return_date")
                ->get();

                $result = $reserved->toBase()->merge($notReserved->toBase());
            }

            else{
                dd($params);
                
                $reserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNotBetween("reservations.pick_up_date",[$start,$end])
                ->whereNotBetween("reservations.return_date",[$start,$end])
                ->get();
    
                $notReserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNull("reservations.pick_up_date")
                ->whereNull("reservations.return_date")
                ->get();
                
                echo("Hey");

                $result = $reserved->toBase()->merge($notReserved->toBase());
            }
        }

        else{
            if(!empty($location) && !empty($type)){
                $result = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->where("location",$location)
                ->where("type",$type)
                ->groupBy("cars.vehicle_registration")
                ->get();
            }

            else if(!empty($location)){
                $result = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->where("location",$location)
                ->groupBy("cars.vehicle_registration")
                ->get();
            }

            else if(!empty($type)){
                $result = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->where("type",$type)
                ->groupBy("cars.vehicle_registration")
                ->get();
            }
        }

        if(!empty($result)){
            return view("search",[
                "results"=>$result
            ]);
        }

        else{
            return view("search",[
                "results"=>Car::all()
            ]);
        }
        
    }
}
