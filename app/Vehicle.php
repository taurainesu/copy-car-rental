<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //
    protected $guarded = [];

    public function reservations()
    {
        return $this->hasMany("App\Reservation");
    }
}
