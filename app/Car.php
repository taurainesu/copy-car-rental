<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Car extends Model
{
    //
    protected $guarded = [];

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


        public function delete()
        {
            
        }

        public function resize($file,$w,$h,$crop=FALSE){
            $path = storage_path();
            $path = str_replace("/","\\",storage_path($file));
            $path = str_replace("\\\\","\\",$path);
            $path =str_replace("storage","public",$path);
            

            list($width, $height) = getimagesize($path);
            $r = $width / $height;
            if ($crop) {
                if ($width > $height) {
                    $width = ceil($width-($width*abs($r-$w/$h)));
                } else {
                    $height = ceil($height-($height*abs($r-$w/$h)));
                }
                $newwidth = $w;
                $newheight = $h;
            } else {
                if ($w/$h > $r) {
                    $newwidth = $h*$r;
                    $newheight = $h;
                } else {
                    $newheight = $w/$r;
                    $newwidth = $w;
                }
            }

            $src = imagecreatefromwebp($path);
            $dst = imagecreatetruecolor($newwidth, $newheight);
            imagecopyresampled($dst, $src, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

            imagewebp($dst,$path,100);

            return $file;
        }



        


        public function setStatusAttribute($value)
        {
            $this->attributes['status'] = strtolower($value);
        }





}
