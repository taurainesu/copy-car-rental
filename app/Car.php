<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\Eloquent\SoftDeletes;

class Car extends Model
{
    //
    protected $guarded = [];
    use SoftDeletes;

    public function reservations()
    {
        return $this->hasMany("App\Reservation");
    }


    public function user()
    {
        return $this->belongsTo("App\User");
    }


    public function is_free($start_date,$end_date){
        global $available;
        $available=true;
        
        $start_date = new Carbon($start_date);
        $end_date = new Carbon($end_date);
        $reservations=$this->reservations->where('reservation_status','active');
        foreach($reservations as $res){
            
            $res_start=new Carbon($res->pick_update);
            $res_end=new Carbon($res->return_date);
            $first_start_test=$start_date->between($res_start, $res_end);
            $first_end_test=$end_date->between($res_start, $res_end);
            $second_start_test=$res_start->between($start_date,$end_date);
            $second_end_test=$res_end->between($start_date,$end_date);



            $available = ($first_start_test || $first_end_test || $second_start_test|| $second_end_test) ? false : true;

            

            if (!$available) {
                return $available;
                 break ;}

            
            }

            return $available;


            }


        public function soft_delete()
        {
            


                try{
                    $this->destroy($this->id);
                    }catch(ModelNotFoundException $e){
    
                        return redirect()->route('home');
                    }
        
        }


        


        public function setStatusAttribute($value)
        {
            $this->attributes['status'] = strtolower($value);
        }

        public function approve(){

            $this->setStatusAttribute("approved");
            $this->save();
        }

        public function restore_car(){
            $this->restore();
            $this->setStatusAttribute("pending");
            $this->save();
        }

        public function reject(){

            $this->setStatusAttribute("rejected");
            $this->save();
        }

        public function remove(){
            $this->setStatusAttribute("deleted");
            $this->save();


        }





}
