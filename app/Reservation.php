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


    public function payment()
    {
        return $this->hasOne("App\Payment");
    }

    public function setStatusAttribute($value)
        {
            $this->attributes['reservation_status'] = strtolower($value);
        }


        public function updateReservation($data)
        {
          $this->attributes['pick_up_date']=$data['pick_up_date'];
          $this->attributes['return_date'] =$data['return_date'];
          $this->attributes['total_cost']=$data['total_cost'];
          $this->save();
          return $this;
        }


        public function setPaymentAttribute($value)
        {
            $this->attributes['payment_status'] = strtolower($value);
            $this->save();
        }


        public function setreturnDateAttribute($value)
        {
            $this->attributes['return_date'] = strtolower($value);
        }



        
}
