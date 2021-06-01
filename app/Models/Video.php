<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;
class Video extends Model
{ 
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];



   	public function thumbnail()
   	{
   		if($this->thumbnail!=null)
    		return '/storage/thumbnail/'.$this->thumbnail;
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
    public function url()
    { 
    	if($this->type=="OFFLINE")return $this->url;
    	else if ($this->type=="LIVE")return $this->url;
    	else if ($this->type=="RECORDED"){
    		if($this->url==null)return $this->url;
    		else{	 
                return Storage::disk('s3_private')->temporaryUrl(
                      'videos/' .$this->url ,
                      now()->addHour()
                  );  
    		}
    	} 
    }
    public function user_has_access_to_video()
    {
        if($this->cost_type=="FREE" || $this->course->price==0){
            return $this->url();
        }else{
            if(auth()->check()){
                if(auth()->power=="ADMIN")return $this->url();
                else{
                    if($this->course->price==0)return $this->url();
                    else{
                        $order=\App\Models\Order::where([
                            ['user_id','=',auth()->user()->id],
                            ['course_id','=',$video->course_id],
                            ['status','=','DONE'],
                            ['type','=','COURSE']
                        ])->first();
                        if($order==null){
                            return $this->url();
                        }
                    }
                }
            }
        }
        return 0;
    }
    public function has_access_to_video(){
        if($this->cost_type=="FREE" || $this->course->price==0)
            return 1;
        else{
            if(auth()->check()){
                if(auth()->user()->power=="ADMIN")return 1;
                else{
                    if($this->course->price==0)return 1;
                    else{
                        $order=\App\Models\Order::where([
                            ['user_id','=',auth()->user()->id],
                            ['course_id','=',$this->course_id],
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
    public function course(){
        return $this->belongsTo('\App\Models\Course');
    }
    
    /*'cost_type'=>"required|in:FREE,PAID",
    'type'=>"required|in:LIVE,RECORDED,OFFLINE", */
}
