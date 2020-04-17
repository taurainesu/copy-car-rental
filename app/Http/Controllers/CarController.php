<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


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
            $carImage = time()."1.".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl1']);
            $data['imageUrl1'] ='/images/cars/'.$carImage;
        }

        if($files = $request->file('imageUrl2')){
            $destination = 'images/cars/';
            $carImage = time()."2.".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl2']);
            $data['imageUrl2'] ='/images/cars/'.$carImage;
        }


        if($files = $request->file('imageUrl3')){
            $destination = 'images/cars/';
            $carImage = time()."3.".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl3']);
            $data['imageUrl3'] ='/images/cars/'.$carImage;
        }


        if($files = $request->file('imageUrl4')){
            $destination = 'images/cars/';
            $carImage = time()."4.".$files->getClientOriginalExtension();
            $files->move($destination,$carImage);
            unset($data['imageUrl4']);
            $data['imageUrl4'] ='/images/cars/'.$carImage;
        }


        $data['user_id'] = Auth::id();
        $data['status'] = "pending";
       try{
            Car::create($data);
        
          }
            
        catch(QueryException $e){
            return redirect()->route('home')->with('vehicle_status', 'vehicle already registered'); }
       
        return redirect()->route('home');
    }

    public function index(){


        return view("new_car", [
            
            'home'=>false,
            'vehicles'=>false,
            'register'=>false,
            'my_reservation'=>false,
            'register'=>true,
        ] );
        


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
        $type = strtolower($params['carType']);

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
                ->get();

                $result = $reserved->toBase()->merge($notReserved->toBase());
            }

            else if(!empty($location)){
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
                ->get();

                $result = $notReserved->toBase()->merge($reserved->toBase());
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
                ->get();

                $result = $reserved->toBase()->merge($notReserved->toBase());
            }

            else{
                $reserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNotBetween("reservations.pick_up_date",[$start,$end])
                ->whereNotBetween("reservations.return_date",[$start,$end])
                ->get();
    
                $notReserved = DB::table("cars")
                ->leftJoin("reservations","cars.id","reservations.car_id")
                ->whereNull("reservations.pick_up_date")
                ->get();

                $result = $reserved->toBase()->merge($notReserved->toBase());

            }
        }

        else{
            if(!empty($location) && !empty($type)){
                $result = DB::table("cars")
                ->where("location",$location)
                ->where("type",$type)
                ->groupBy("cars.vehicle_registration")
                ->get();
            }

            else if(!empty($location)){
                $result = DB::table("cars")
                ->where("location",$location)
                ->groupBy("cars.vehicle_registration")
                ->get();
            }

            else if(!empty($type)){
                $result = DB::table("cars")
                ->where("type",$type)
                ->groupBy("cars.vehicle_registration")
                ->get();
            }
        }

        if(!empty($result)){
            //dd(json_encode($result));
            return view("search",[
                "result"=>$result
            ]);
        }

        else{
            return view("search",[
                "result"=>Car::all()
            ]);
        }
        
    }



    public function delete($tab,$last,$id){

       $car= Car::find($id);
       $last_tab=$tab.'/'.$last;
       $car->remove();
       $car->soft_delete();
       return redirect()->route('admin')->with('last_tab', $last_tab);

    }


    public function approve($tab,$last,$id){

        $car= Car::find($id);
        $last_tab=$tab.'/'.$last;

        $car->approve();
        return redirect()->route('admin')->with('last_tab', $last_tab);
 
     }


     public function reject($tab,$last,$id){

        $car= Car::find($id);
        $last_tab=$tab.'/'.$last;

        $car->reject();
        return redirect()->route('admin')->with('last_tab', $last_tab);
 
     }


     public function restore($tab,$last,$id){
        $car = Car::withTrashed()
                ->where('id' ,$id)
                ->firstOrFail();

        $last_tab=$tab.'/'.$last;

        $car->restore_car();
        return redirect()->route('admin')->with('last_tab', $last_tab);
 
     }
}
