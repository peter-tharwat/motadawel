<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Setting;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings=\App\Models\Setting::first(); 
        if($settings==null){\App\Models\Setting::create();}
        return view('admin.settings.edit');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Setting $setting)
    {
       
        $setting->update([ 
            'email'=>$request->email,
            'phone'=>$request->phone,
            'whatsapp_phone'=>$request->whatsapp_phone,
            'twitter_link'=>$request->twitter_link,
            'snap_link'=>$request->snap_link,
            'instagram_link'=>$request->instagram_link,
            'youtube_link'=>$request->youtube_link,
            'youtube_video_link'=>$request->youtube_video_link,
            'bio'=>$request->bio,
            'why_chart'=>$request->why_chart,
            'target'=>$request->target,
            'message'=>$request->message,
            'vision'=>$request->vision,
            'terms'=>$request->terms,
            'privacy'=>$request->privacy
        ]);
        emotify('success', 'تم التحديث بنجاح');
        return redirect()->back();
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
