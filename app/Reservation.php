<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    //
    protected $guarded = [];

    public function user(){
        return $this->belongsToMany("App\User");
    }

    public function car(){
        return $this->belongsTo("App\Car");
    }
}
