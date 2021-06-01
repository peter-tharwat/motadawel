<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Contracts\Filesystem\Filesystem;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function upload_file( 
    	$file=null,
    	$path="uploads",
    	$privacy="public"
    )
    {
       
    	if(isset($file)){ 
    		$file_name = uniqid() . '.' . $file->getClientOriginalExtension(); 
    		$filePath = '/'.$path.'/' . $file_name;
            if($privacy=="public")
    		  \Storage::put($filePath, file_get_contents($file), $privacy);
            else if($privacy=="private")
              \Storage::disk('s3_private')->put($filePath, file_get_contents($file), $privacy);
    		return $file_name; 
    	}
    	return '';
    }
    public function get_youtube_id_from_url($url)  {
         preg_match('/(http(s|):|)\/\/(www\.|)yout(.*?)\/(embed\/|watch.*?v=|)([a-z_A-Z0-9\-]{11})/i', $url, $results);    return $results[6];
    }
}
