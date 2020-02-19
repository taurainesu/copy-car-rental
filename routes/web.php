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

Route::get('/', function () {
    return view('home');
})->middleware("auth");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get("/cars/search",'CarController@search')->name("search");

Route::get("cars/new","CarController@index")->name("new_car");

Route::get("cars/get","CarController@cars")->name("get_cars");

Route::post("cars/new","CarController@store")->name("new_car_post");

Route::get("cars/info/{id}","CarController@car")->name("get_car");


