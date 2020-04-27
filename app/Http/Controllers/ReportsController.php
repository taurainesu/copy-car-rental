<?php

namespace App\Http\Controllers;

use App\Car;
use App\Reservation;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class ReportsController extends Controller
{
    //

    public function dailyVehicles(){
        $date = date("Y-m-d ",time());
        $startDate = $date."00:00:00";
        $endDate = $date."23:59:59";

        $cars = count(Car::where('created_at',">=",$startDate)
        ->where('created_at',"<=",$endDate)
        ->get());

        $harare = count(Car::where('created_at',">=",$startDate)
        ->where('created_at',"<=",$endDate)
        ->where("location","Harare")
        ->get());

        $bulawayo = count(Car::where('created_at',">=",$startDate)
        ->where('created_at',"<=",$endDate)
        ->where("location","Bulawayo")
        ->get());

        $others = count(Car::where('created_at',">=",$startDate)
        ->where('created_at',"<=",$endDate)
        ->where("location","!=","Harare")
        ->where("location","!=","Bulawayo")
        ->get());

        //getTodayDate
        //fetchall reservations with todays date
        //total reservations today only
        //total new cars

        return [
            'all'=>count(Car::all()),
            'vehicles'=>$cars,
            'harare'=>$harare,
            'bulawayo'=>$bulawayo,
            'others'=>$others,
        ];

        
    }

    public function dailyReservations(){
        $date = date("Y-m-d ",time());
        $startDate = $date."00:00:00";
        $endDate = $date."23:59:59";

        $reservations = count(Reservation::where('created_at',">=",$startDate)
        ->where('created_at',"<=",$endDate)
        ->get());

        $harare = count(
            DB::table('cars')
        ->join("reservations","reservations.car_id","cars.id")
        ->where("cars.location","Harare")
        ->where('reservations.created_at',">=",$startDate)
        ->where('reservations.created_at',"<=",$endDate)
        ->get()
        );

        $bulawayo = count(
            DB::table('cars')
        ->join("reservations","reservations.car_id","cars.id")
        ->where("cars.location","Bulawayo")
        ->where('reservations.created_at',">=",$startDate)
        ->where('reservations.created_at',"<=",$endDate)
        ->get()
        );

        $others = count(
            DB::table('cars')
        ->join("reservations","reservations.car_id","cars.id")
        ->where("cars.location","!=","Bulawayo")
        ->where("cars.location","!=","Harare")
        ->where('reservations.created_at',">=",$startDate)
        ->where('reservations.created_at',"<=",$endDate)
        ->get()
        );

        return [
            'reservations'=>$reservations,
            'harare'=>$harare,
            'bulawayo'=>$bulawayo,
            'others'=>$others,
        ];

        
    }

    public function ddr(){

        $date = date("Y-m-d ",time());
        $startDate = $date."00:00:00";
        $endDate = $date."23:59:59";

        $query = DB::table('cars')
        ->join("reservations","reservations.car_id","cars.id")
        ->join("users","users.id","reservations.user_id")
        ->join("suppliers","cars.user_id","suppliers.id")
        ->select(['cars.brand','cars.model','suppliers.supplier_name','users.name as reserved_by','cars.location','reservations.pick_up_date','reservations.return_date','cars.vehicle_registration as vehicle_reg'])
        ->where('reservations.created_at',">=",$startDate)
        ->where('reservations.created_at',"<=",$endDate)
        ->get();

        $harare = count(
            DB::table('cars')
        ->join("reservations","reservations.car_id","cars.id")
        ->where("cars.location","Harare")
        ->where('reservations.created_at',">=",$startDate)
        ->where('reservations.created_at',"<=",$endDate)
        ->get()
        );

        $bulawayo = count(
            DB::table('cars')
        ->join("reservations","reservations.car_id","cars.id")
        ->where("cars.location","Bulawayo")
        ->where('reservations.created_at',">=",$startDate)
        ->where('reservations.created_at',"<=",$endDate)
        ->get()
        );

        $others = count(
            DB::table('cars')
        ->join("reservations","reservations.car_id","cars.id")
        ->where("cars.location","!=","Bulawayo")
        ->where("cars.location","!=","Harare")
        ->where('reservations.created_at',">=",$startDate)
        ->where('reservations.created_at',"<=",$endDate)
        ->get()
        );

        $data = [
            'reservations'=> $query,
            'harare'=> $harare,
            'bulawayo'=>$bulawayo,
            'others'=>$others
        ];

        // Send data to the view using loadView function of PDF facade
        //$pdf = PDF::loadView('reports.dailyReserved', $data);

        //return $pdf->download("document.pdf");
        // If you want to store the generated pdf to the server then you can use the store function
        // Finally, you can download the file using download function
        //return $pdf->download('generated.pdf');

        return view('reports.dailyReserved',[
            'reservations'=> $query,
            'harare'=> $harare,
            'bulawayo'=>$bulawayo,
            'others'=>$others
        ]);

    }

    public function ddv(){
        $date = date("Y-m-d ",time());
        $startDate = $date."00:00:00";
        $endDate = $date."23:59:59";

        $query = DB::table('cars')
        ->join("users","users.id","cars.user_id")
        ->select(['cars.brand','cars.model','users.name as supplier','cars.location','cars.vehicle_registration as vehicle_reg'])
        ->where('cars.created_at',">=",$startDate)
        ->where('cars.created_at',"<=",$endDate)
        ->get();

        $harare = count(DB::table('cars')
        ->where('created_at',">=",$startDate)
        ->where('created_at',"<=",$endDate)
        ->where("location","Harare")
        ->get());

        $bulawayo = count(DB::table('cars')
        ->where('caeated_at',">=",$startDate)
        ->where('caeated_at',"<=",$endDate)
        ->where("location","Bulawayo")
        ->get());    
        
        $others = count(DB::table('cars')
        ->where('created_at',">=",$startDate)
        ->where('created_at',"<=",$endDate)
        ->where("location","!=","Bulawayo")
        ->where("location","!=","Harare")
        ->get());     
        
        return view('reports.dailyRegistered',[
            'vehicles'=> $query,
            'harare'=> $harare,
            'bulawayo'=>$bulawayo,
            'others'=>$others
        ]);
    }
}
