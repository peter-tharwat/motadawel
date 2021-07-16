<?php

namespace App\Http\Controllers;

use App\Models\MohallelVideo;
use Illuminate\Http\Request;

class MohallelVideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $videos=MohallelVideo::orderBy('id','DESC')->paginate();
        return view('admin.mohallel.videos.index',compact('videos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mohallel.videos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       MohallelVideo::create([
            'title'=>$request->title,
            'description'=>$request->description,
            'video_url'=>$request->video_url,
            'link'=>$request->link,
       ]);
       emotify('success','تم اضافة الفيديو بنجاح');
       return redirect()->route('mohallel-videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\MohallelVideo  $mohallel_video
     * @return \Illuminate\Http\Response
     */
    public function show(MohallelVideo $mohallel_video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\MohallelVideo  $mohallel_video
     * @return \Illuminate\Http\Response
     */
    public function edit(MohallelVideo $mohallel_video)
    {
        return view('admin.mohallel.videos.edit',compact('mohallel_video'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\MohallelVideo  $mohallel_video
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MohallelVideo $mohallel_video)
    {
        $mohallel_video->update([
            'title'=>$request->title,
            'description'=>$request->description,
            'video_url'=>$request->video_url,
            'link'=>$request->link,
       ]);
       emotify('success','تم تعديل الفيديو بنجاح');
       return redirect()->route('mohallel-videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\MohallelVideo  $mohallel_video
     * @return \Illuminate\Http\Response
     */
    public function destroy(MohallelVideo $mohallel_video)
    {
        $mohallel_video->delete();
        emotify('success','تم الحذف بنجاح');
       return redirect()->route('mohallel-videos.index');
    }
}
