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

use Symfony\Component\HttpFoundation\Request;
use Illuminate\Http\Request as RequestToo;

Route::get('/', "HomeController@index")->name("home");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/cars/search",'CarController@search')->name("search");

Route::get("cars/new","CarController@index")->name("new_car");

Route::get("cars/get","CarController@cars")->name("get_cars");

Route::post("cars/new","CarController@store")->name("new_car_post");

Route::get("cars/info/{id}","CarController@car")->name("get_car");

Route::post("reservations/new","ReservationController@save_data")->name("new_reservation");

Route::get("reservation/update/{id}","ReservationController@update_reservation")->name("update_reservation");


Route::get("reservations","ReservationController@get_reservations")->name("view_reservations");



Route::get("reservation/view/{id}","ReservationController@view_reservation")->name("view_reservation");

Route::get('reserve/{id}',"ModalController@pop_modal")->name("modal");



Route::get("error",function(){
    return view("error");
})->name("get_error_page");

Route::get("pay","PaymentsController@pay")->name("pay");

Route::get("cars","HomeController@cars");



