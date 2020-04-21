<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Rates;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        DB::table('users')->insert([
            'id'=> "1",
            'name'=> "Administrator",
            'email'=> "admin@admin.com",
            'phone'=> "0771111111",
            'sex'=> "Male",
            'age'=> "27",
            'password'=>Hash::make('taurayinesu'),
            'address'=> "03 Chancellor Rd Harare",
            'nationality'=> "Zimbabwean",
            'country'=> "Zimbabwe",
            'licenseNo'=> "HFJ8392",
            'is_admin'=> 1,
        ]);

        Rates::create(['currency'=>'bond','rate'=>45]);

        Rates::create(['currency'=>'rand','rate'=>17]);

        DB::table('cars')->insert([
        "id"=> "1",
         "brand"=> "Toyota",
         "model"=> "Harrier",
         "location"=> "Harare",
         "vehicle_registration"=> "ADC3899",        
         "physical_address"=> "53 mukuna road",     
         "description"=> "cool car",
         "year"=> "2011",
         "cordinates"=> null,
         "milage"=> "10000",
         "type"=> "SUVs",
         "daily_rate"=>300.00,
         "user_id"=> "1",
         "imageUrl"=> "/images/cars/1584347030.png",
         "imageUrl1"=> "/images/cars/15843470301.png",
         "imageUrl2"=> "/images/cars/15843470302.png",
         "imageUrl3"=> "/images/cars/15843470303.png",
         "imageUrl4"=> "/images/cars/15843470314.png",
         "fuel_type"=> "disiel",
         "engine_capacity"=> "2",
         "color"=> "Green",
         "seats"=> "6",
         "transmission"=> "manual",
         "done"=> null,
         "status"=> "pending",
         "deleted_at"=> null,
        ]);
    }
}
