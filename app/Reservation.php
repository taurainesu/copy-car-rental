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


        public function setReturnDateAttribute($value)
        {
            $this->attributes['return_date'] = strtolower($value);
        }


        public function approveByAgent(){
            $this->setStatusAttribute("approved_by_agent");
            $this->save();
                }


        public function approveByOwner(){
            $this->setStatusAttribute("approved_by_owner");
            $this->save();
                        }


        public function cancelledByAgent(){
            $this->setStatusAttribute("cancelled_by_agent");
            $this->save();
                                }

        public function cancelledByUser(){
                $this->setStatusAttribute("cancelled_by_user");
                $this->save();
                                        }

        public function cancelledByOwner(){
                    $this->setStatusAttribute("cancelled_by_owner");
                     $this->save();
                                                                    }

        public function rejectedByAgent(){
            $this->setStatusAttribute("rejected_by_agent");
            $this->save();
                                                                }
                                
        public function rejectedByUser(){
            $this->setStatusAttribute("rejected_by_user");
            $this->save();
                                                                        }

        

        
}
