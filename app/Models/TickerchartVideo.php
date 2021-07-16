<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TickerchartVideo extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];
    public function small_image()
    {
        if($this->small_image!=null)
            return env('AWS_URL').'/uploads/tickerchart-videos/'.$this->small_image;
        return "https://img.freepik.com/free-vector/abstract-shiny-lines-white-gray-background_1017-25097.jpg?size=626&ext=jpg";
    }
    public function video_url()
    {   
        if($this->video_url!=null){
            try{
                return $this->get_youtube_id_from_url($this->video_url);
            }catch(\Exception $e){}
        }
        else return "";
    }
    public function get_youtube_id_from_url($url)  {
         preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);    return $results[6];
    }
}
