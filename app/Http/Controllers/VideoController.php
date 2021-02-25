<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $videos=Video::where(function($q)use($request){
            $q->where('title','LIKE','%'.$request->key.'%');
            if($request->course_id!=null)
            $q->where('course_id',$request->course_id);
        })->orderBy('id','DESC')->paginate();
        return view('admin.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['course_id'=>'exists:courses,id']);
        $course=\App\Models\Course::where('id',$request->course_id)->firstOrFail();
        return view('admin.videos.create',compact('course')); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'course_id'=>"required|exists:courses,id",
            'title'=>"required|min:3|max:255",
            'description'=>"required|min:3|max:2500",
            'thumbnail'=>'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000', 
            'period'=>"nullable",
            'cost_type'=>"required|string|in:FREE,PAID",
            'type'=>"required|in:LIVE,RECORDED,OFFLINE", 
            'available_at'=>'nullable|date'
        ]);
        $url = "";
        $origin="";
        if($request->type=="LIVE"){
            $request->validate([
                'url'=>"required|url"
            ]);
            $url=$request->url;
            $origin="LIVE";
        }else if ($request->type=="RECORDED"){
            $request->validate([
                'video'=>'nullable|sometimes|mimes:mp4|max:1000000'
            ]);
            $url = $this->upload_file($request->file('video'),'videos','private');
            $origin="RECORDED";
        }else{
            $origin="OFFLINE";
        }   

        /*dd($request->all());
*/
        $video = \App\Models\Video::create([
            'user_id'=>auth()->user()->id,
            'course_id'=>$request->course_id,
            'description'=>$request->description,
            'title'=>$request->title,
            'thumbnail'=>$this->upload_file($request->file('thumbnail'),'thumbnail'),
            'url'=>$url,
            'period'=>$request->period,
            'cost_type'=>$request->cost_type,
            'type'=>$request->type,
            'origin'=>$origin,
            'available_at'=>$request->available_at,
        ]);
        emotify('success', 'تم إضافة الفيديو بنجاح');
        return redirect()->route('videos.index',['course_id'=>$request->course_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        return view('admin.videos.edit',compact('video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Video $video)
    {
        $request->validate([ 
            'title'=>"required|min:3|max:255",
            'description'=>"required|min:3|max:2500",
            'thumbnail'=>"nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000", 
            'period'=>"nullable",
            'cost_type'=>"required|string|in:FREE,PAID",
            'type'=>"required|in:LIVE,RECORDED,OFFLINE", 
            'available_at'=>'nullable|date'
        ]); 
        $url = "";  
        if($request->type=="LIVE"){
            $request->validate([
                'url'=>"required|url"
            ]);
            $url=$request->url; 
        }else if ($request->type=="RECORDED"){
            $request->validate([
                'video'=>'nullable|sometimes|mimes:mp4|max:1000000'
            ]);
            $url = $this->upload_file($request->file('video'),'videos','private'); 
        } 
        // dd($request->all());
        if($url!=null)
            $video->url=$url;
        if($request->thumbnail!=null)
            $video->thumbnail=$this->upload_file($request->file('thumbnail'),'thumbnail');
        
        $video->description=$request->description;
        $video->title=$request->title; 
        $video->period=$request->period;
        $video->cost_type=$request->cost_type;
        $video->type=$request->type; 
        $video->available_at=$request->available_at;
        $video->save(); 


        emotify('success', 'تم تعديل الفيديو بنجاح');
        return redirect()->route('videos.index',['course_id'=>$video->course_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        //
    }
}
