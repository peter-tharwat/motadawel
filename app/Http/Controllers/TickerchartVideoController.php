<?php

namespace App\Http\Controllers;

use App\Models\TickerchartVideo;
use Illuminate\Http\Request;

class TickerchartVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos=TickerchartVideo::orderBy('id','DESC')->paginate();
        return view('admin.tickerchart.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tickerchart.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ticker_chart_video = TickerchartVideo::create([
            'title'=>$request->title,
            'video_url'=>$request->video_url,
            'video_type'=>$request->video_type
        ]);
        if($request->hasFile("small_image")){
            $small_image=$this->upload_file($request->small_image,'/uploads/tickerchart-videos/','public');
            $ticker_chart_video->update(['small_image'=>$small_image]);
        }
        emotify('success', 'تم إضافة الفيديو بنجاح');
        return redirect()->route('tickerchart-videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TickerchartVideo  $tickerchart_video
     * @return \Illuminate\Http\Response
     */
    public function show(TickerchartVideo $tickerchart_video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TickerchartVideo  $tickerchart_video
     * @return \Illuminate\Http\Response
     */
    public function edit(TickerchartVideo $tickerchart_video)
    {
        return view('admin.tickerchart.videos.edit',compact('tickerchart_video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TickerchartVideo  $tickerchart_video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TickerchartVideo $tickerchart_video)
    {
        
        if($request->hasFile("small_image")){
            $small_image=$this->upload_file($request->small_image,'/uploads/tickerchart-videos/','public');
            $tickerchart_video->update(['small_image'=>$small_image]);
        }

        $tickerchart_video->update([
            'title'=>$request->title,
            'video_url'=>$request->video_url,
            'video_type'=>$request->video_type
        ]);
        emotify('success', 'تم تعديل الفيديو بنجاح');
        return redirect()->route('tickerchart-videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TickerchartVideo  $tickerchart_video
     * @return \Illuminate\Http\Response
     */
    public function destroy(TickerchartVideo $tickerchart_video)
    {
        $tickerchart_video->delete();
        emotify('success','تم الحذف بنجاح');
       return redirect()->route('tickerchart-videos.index');
    }
}
