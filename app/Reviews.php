<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    //
    protected $guarded = [];

    public function reservation(){
        return $this->belongsToMany("App\Reservation");
    }

    public function car(){
        return $this->belongsToMany("App\Car");
    }
}
