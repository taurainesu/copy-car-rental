<?php

use App\Car;
use Illuminate\Support\Str;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\Http\Resources\Reservations as ReservationsResource;
use App\Rates;
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request as RequestToo;
use App\Reservation;
use App\User;
use Paynow\Payments\Paynow;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/', "HomeController@index")->name("home");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware("auth");

Route::get("/admin/vehicle/report/{type}",'AdminController@vehicle_report')->name("vehicle_report")->middleware('admin');

Route::get("/admin/reservation/report/{type}",'AdminController@reservation_report')->name("reservation_report")->middleware('admin');

Route::get('ajax',function() {
    return view('message');
 });



 Route::post("/poll","PaymentController@poll")->name('gets');




Route::get("cars/new","CarController@index")->name("new_car");



Route::get("cars/get","CarController@cars")->name("get_cars");



Route::post("cars/new","CarController@store")->name("new_car_post");

Route::post("user/admin","AdminController@makeAdmin")->name("make_admin");

Route::get("cars/info/{id}","CarController@car")->name("get_car");

Route::post("cars/review/{id}","CarController@review_car")->name("review_car");

Route::get("cars/approve/{tab}/{last}/{id}","CarController@approve")->name("approve_car");


Route::get("cars/reject/{tab}/{last}/{id}","CarController@reject")->name("reject_car");

Route::get("cars/restore/{tab}/{last}/{id}","CarController@restore")->name("restore_car");

Route::get("cars/update/{id}","CarController@approve")->name("update_car");

Route::get("cars/delete/{tab}/{last}/{id}","CarController@delete")->name("delete_car");

Route::post("reservations/new","ReservationController@save_data")->name("new_reservation");

Route::post("reservation/update/{id}","ReservationController@update_reservation")->name("update_reservation");

Route::post("reservation/review/{id}","ReservationController@review_reservation")->name("review_reservation");
Route::get("reservation/delete/{tab}/{last}/{id}","ReservationController@delete_reservation")->name("delete_reservation");

Route::get("reservation/approve/{tab}/{last}/{id}","ReservationController@approve_reservation")->name("approve_reservation");


Route::get("reservation/cancel/{tab}/{last}/{id}","ReservationController@cancelReservation")->name("cancel_reservation");
Route::get("reservation/reject/{tab}/{last}/{id}","ReservationController@rejectReservation")->name("reject_reservation");

Route::get("reservations","ReservationController@get_reservations")->name("view_reservations");



Route::get("reservation/view/{id}","ReservationController@view_reservation")->name("view_reservation");

Route::get('reserve/{id}',"ModalController@pop_modal")->name("modal");

Route::get('/marez', function () {return new ReservationsResource(Reservation::all());});



Route::get("error",function(){
    return view("error");
})->name("get_error_page");

Route::get("pay","PaymentsController@pay")->name("pay");

Route::get("cars","HomeController@cars");

Route::get("cars/search","CarController@search");

//facebook
Route::get('login/facebook', 'FacebookController@redirectToProvider')->name("user-facebook");
Route::get('login/facebook/callback', 'FacebookController@handleProviderCallback');

Route::get('supplier/login/facebook', 'FacebookController@redirectToProviderSupplier')->name("supplier-facebook");
Route::get('supplier/login/facebook/callback', 'FacebookController@handleProviderCallbackSupplier');

Route::get("/payment",function(){
    $paynow = new Paynow("6668", "b0b170e0-c950-4800-b56c-9ce4e4e02e14",'https://www.google.com','google.com' );
    $payment = $paynow->createPayment('Invoice 35', 'melmups@outlook.com');

    $payment->add('Sadza and Beans', 1.25);

    $response = $paynow->sendMobile($payment,'0773330550','Ecocash');

    dd($response);

    if($response->success()) {
        // Or if you prefer more control, get the link to redirect the user to, then use it as you see fit
        $link = $response->redirectUrl();

        $pollUrl = $response->pollUrl();

        // Check the status of the transaction
        $status = $paynow->pollTransaction($pollUrl);

        dd($status);

        return redirect($pollUrl);

    }
})->middleware("auth");

Route::post("/rates/get",function(){
    return Rates::all();
});

Route::post("/rates/update",function(){

    $bond = request()->bond;
    $rand = request()->rand;

    $rates = Rates::all();

    if(count($rates) == 0){
        $insertA = Rates::create(['currency'=>'ZWL','rate'=>$bond]);
        $insertB = Rates::create(['currency'=>'Rand','rate'=>$rand]);

        if($insertA && $insertB){
            return ['message'=>true];
        }
    }

    else{
        $findBond = Rates::where('currency','ZWL')->get()->first();
        $findRand = Rates::where('currency','Rand')->get()->first();

        if(!empty($rand)){
            $insertA = $findRand->update(['rate'=>$rand]);
        }

        if(!empty($bond)){
            $insertB = $findBond->update(['rate'=>$bond]);
        }

        if($insertA && $insertB){
            return ['message'=>true];
        }

    }

    return ['message'=>false];

});

Route::post("/reports/get/daily/vehicles",'ReportsController@dailyVehicles');

Route::post("/reports/get/daily/reservations",'ReportsController@dailyReservations');

Route::get("/reports/daily/reservations/download","ReportsController@ddr");

Route::get("/reports/daily/vehicles/download","ReportsController@ddv");

Route::post("/user/id",function(){
    return [
        "id"=>Auth::id()
    ];
});


Route::get("/send/mail",function(){
    $data = array('name'=>"Daveson Mukuna");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('mkunadavy@outlook.com', 'Davyson Mukuna')
         ->subject
            ('Paynow Mail');
      });

      echo "Basic Email Sent. Check your inbox.";
});

Route::get("/reset/password",function(){

    return view("auth.passwords.reset",['token'=>request()->token]);
});

Route::get("/reset/link",function(){
    return view("auth.passwords.sendlink");
})->name("sendlink");

Route::post("/send/link",function(){
    $data = request()->email;
    $user = User::where("email",$data)->select('email','name')->get()->first();
    $str = Str::random(90);

    if($user !== null){

        $message = "You have requested a password reset link and click here to reset :- http://localhost:8000/reset/password?token=".$str;
        //notify

        DB::table('password_resets')->insert(
            ['email' => $data, 'token' => $str,"created_at"=>time()]
        );

        Mail::send(['text'=>'mail'], ['name'=>$message], function($message) use ($user) {
            $message->to($user->email,$user->name)
            ->subject('Reset password');
         });

        $user->save();
    }

    return ['message'=>true];
});

Route::post("/reset/password",function(){
    //get user
    $data = request()->all();

    //validation

    $token = DB::table("password_resets")
    ->where("token",$data['token'])
    ->where("email",$data['email'])
    ->get()->first();

    if($token != null){

        $user = User::where("email",$data['email'])->get()->first();

        $user->password = Hash::make($data['password']);

        $user->save();

        DB::table("password_resets")
        ->where("email",$data['email'])
        ->delete();

        return redirect("/login");
    }

})->name("resetPassword");


//Supplier routes
Route::get("/supplier/login",function(){
    return view("auth.supplierlogin");
})->name("supplier-login");

Route::get("/supplier/register",function(){
    return view("auth.supplierregister");
})->name("supplier-register");

Route::post("/supplier/register",function(){
    $data = request()->all();
    //add user

    $user = User::create([
        'name' => ucwords($data['name']),
        'email' => strtolower($data['email']),
        'password' => Hash::make($data['password']),
        'phone'=>$data['phone'],
        'licenseNo'=>strtoupper($data['licenseNo']),
        'sex'=>$data['sex'],
        'address'=>ucwords($data['address']),
        'age'=>$data['age'],
        'isSupplier'=>true,
        'nationality'=>ucfirst($data['nationality']),
        'country'=>$data['country'],
        'facebookID'=>$data['facebookID'],
    ]);

    if($user){
        auth()->login($user);
        return redirect('/supplier/add/car');
    }

    return redirect("/supplier/register")->withErrors(['main'=>'Error creating account']);
    //redirect yo new car

})->name("supplier-register");

Route::post("/supplier/login",function(){
    $data = request();
    $all = $data->all();
    $user = User::where('email',$all['email'])->get()->first();

    if($user != null && $user->isSupplier){
        if(Auth::attempt($data->only('email','password'))){
            auth()->login($user);
            return redirect("/supplier/home");
        }
    };

    return redirect("/supplier/login")->withErrors(['email'=>"These credentials are incorrect."]);

})->name("supplier-login");

Route::get("/supplier/home",function(){
    $cars = Car::where("user_id",Auth::user()->id)->get();

    if(count($cars) <= 0){
        return redirect("/supplier/add/car")->with(['no_cars'=>true]);
    }

    return view("suppliers.home",[
        'cars'=>Car::where("user_id",Auth::user()->id)->get(),
        'reservations'=>Car::where("user_id",Auth::user()->id)->with('reservations')->get(),
        'users'=>User::all(),
        'car'=>""
    ]);

})->middleware("supplier");





Route::get("supplier/cars",'CarController@my_cars')->name("my_cars")->middleware('supplier');


Route::get("supplier/reservations",'ReservationController@my_reservations')->name("my_reservations")->middleware('supplier');

Route::get("supplier/reservation/{id}","ReservationController@view_supplier_reservation")->name("view_supplier_reservation")->middleware('supplier');



Route::get("/supplier/add/car",function(){
    $cars = Car::where("user_id",Auth::user()->id)->get();

    if(count($cars) <= 0){
        return view("suppliers.new_car")->with(['no_cars'=>true]);
    }

    return view("suppliers.new_car");

})->name("add_car");


//admin routes
Route::get("/admin",'AdminController@index')->name("admin")->middleware('admin');


//info
Route::get("/info",function(){
    return phpinfo();
});






