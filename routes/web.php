<?php

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
use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request as RequestToo;
use App\Reservation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', "HomeController@index")->name("home");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/admin",'AdminController@index')->name("admin");



Route::get("cars/new","CarController@index")->name("new_car");



Route::get("cars/get","CarController@cars")->name("get_cars");

Route::post("cars/new","CarController@store")->name("new_car_post");

Route::get("cars/info/{id}","CarController@car")->name("get_car");

Route::get("cars/approve/{tab}/{last}/{id}","CarController@approve")->name("approve_car");


Route::get("cars/reject/{tab}/{last}/{id}","CarController@reject")->name("reject_car");

Route::get("cars/restore/{tab}/{last}/{id}","CarController@restore")->name("restore_car");

Route::get("cars/update/{id}","CarController@approve")->name("update_car");

Route::get("cars/delete/{tab}/{last}/{id}","CarController@delete")->name("delete_car");

Route::post("reservations/new","ReservationController@save_data")->name("new_reservation");

Route::get("reservation/update/{id}","ReservationController@update_reservation")->name("update_reservation");

Route::get("reservation/delete/{tab}/{last}/{id}","ReservationController@delete_reservation")->name("delete_reservation");


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





