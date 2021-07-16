<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MohallelVideo extends Model
{
    use HasFactory;
    protected $guarded = ['id','created_at','updated_at'];


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
