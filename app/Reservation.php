<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    //

    use SoftDeletes;
    protected $guarded = [];

    public function user(){
        return $this->belongsToMany("App\User");
    }

    public function car(){
        return $this->belongsTo("App\Car");
    }

    public function setStatusAttribute($value)
        {
            $this->attributes['status'] = strtolower($value);
        }


        public function setreturnDateAttribute($value)
        {
            $this->attributes['return_date'] = strtolower($value);
        }



        
}
