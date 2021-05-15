<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccessController extends Controller
{
   public function get_video_url(Request $request)
   {
   	//if(!auth()->check())return ['url'=>''];

   	$video=\App\Models\Video::where('id',$request->id)->first();
      return view('templates.video',compact('video'))->render();

 

   	//$video->user_has_access_to_video(); [0 || URL]

   /*	if(TRUE){ 
	   	if($video==null){
	   		return ['url'=>''];
	   	}else{
	   		return ['url'=>$video->url()];
	   	}
   	}*/


   }
}
