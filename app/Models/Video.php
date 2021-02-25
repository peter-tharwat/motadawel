<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
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
    			return '/storage/videos/'.$this->url;
    		}
    	} 
    }
    
    /*'cost_type'=>"required|in:FREE,PAID",
    'type'=>"required|in:LIVE,RECORDED,OFFLINE", */
}
