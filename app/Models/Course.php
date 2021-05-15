<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
class Course extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function image()
    {
    	if($this->image!=null)
    		return '/storage/images/'.$this->image;
    	return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
    public function banner()
    {
    	if($this->banner!=null)
    		return '/storage/banners/'.$this->banner;
    	return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
    public function getAvailableAtForHumansAttribute()
    {
        return Carbon::parse($this->available_at)->diffForHumans();
    }

    public function getAvailableAtAttribute($available_at)
    {
        return Carbon::parse($available_at)->format('Y-m-d\TH:i');
    }
    public function getAcceptPaymentsUntillAttribute($accept_payments_untill)
    {
        return Carbon::parse($accept_payments_untill)->format('Y-m-d\TH:i');
    }
    
    public function videos()
    {
        return $this->hasMany('\App\Models\Video');
    }
    public function order()
    {
        return $this->hasMany('\App\Models\Order');
    }
    public function ratings()
    {
        return $this->hasMany('\App\Models\CourseReview');
    } 
    public function has_access_to_rate_course(){
        if(!auth()->check())return 0; 
        else if($this->price==0){
            return 1;
        }else if(auth()->check()){
            if(auth()->user()->power=="ADMIN")return 1; 
            $order=\App\Models\Order::where([
                ['user_id','=',auth()->user()->id],
                ['course_id','=',$this->id],
                ['status','=','DONE'],
                ['type','=','COURSE']
            ])->first();
            if($order==null){
                return 0;
            } else{
                return 1;
            }
        } 
        return 0;
    }
    public function has_access_to_course(){
        if($this->price==0)
            return 1;
        else{
            if(auth()->check()){
                if(auth()->user()->power=="ADMIN")return 1;
                else{
                    if($this->price==0)return 1;
                    else{
                        $order=\App\Models\Order::where([
                            ['user_id','=',auth()->user()->id],
                            ['course_id','=',$this->id],
                            ['status','=','DONE'],
                            ['type','=','COURSE']
                        ])->first();
                        if($order==null){
                            return 0;
                        }else{
                            return 1;
                        }
                    }
                }
            }
        }
        return 0;
    }

}
