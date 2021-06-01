<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $courses=Course::where(function($q)use($request){
            $q->where('title','LIKE','%'.$request->key.'%');
            if($request->id!=null)
                $q->where('id',$request->id);
            if($request->type!=null)
                $q->where('type',$request->type);
        })->orderBy('id','DESC')->paginate();
        return view('admin.courses.index',compact('courses'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.courses.create');

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
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3|max:100000', 
            'image' => 'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            'banner'=>'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            'price'=>'required|min:0|max:10000',
            'available_at'=>'required|date',
            'accept_payments_untill'=>'required|date',
            'type'=>"required|string|in:RECORDED,LIVE,OFFLINE"
        ]); 
        $course = Course::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'description'=>$request->description, 
            'banner'=>$this->upload_file($request->file('banner'),'banners'),
            'image'=>$this->upload_file($request->file('image'),'images'),
            'price'=>$request->price,
            'available_at'=>$request->available_at,
            'accept_payments_untill'=>$request->accept_payments_untill,
            'type'=>$request->type,
            'whatsapp_phone'=>$request->whatsapp_phone,
        ]); 
        emotify('success', 'تم إضافة الكورس بنجاح');
        return redirect()->route('courses.index');

/*                user_id
title
description
url*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        dd($course);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        return view('admin.courses.edit',compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3|max:100000', 
            'image' => 'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            'banner'=>'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            'price'=>'required|min:0|max:10000',
            'available_at'=>"required|date",
            'accept_payments_untill'=>'required|date',
            'type'=>"required|string|in:RECORDED,LIVE,OFFLINE"
        ]);
        $course->update([ 
            'title'=>$request->title,
            'description'=>$request->description,
            'url'=>$request->url,
            'banner'=>$request->hasFile('banner')?$this->upload_file($request->file('banner'),'banners'):$course->banner,
            'image'=>$request->hasFile('image')?$this->upload_file($request->file('image'),'images'):$course->image,
            'price'=>$request->price,
            'available_at'=>$request->available_at,
            'accept_payments_untill'=>$request->accept_payments_untill,
            'type'=>$request->type,
            'whatsapp_phone'=>$request->whatsapp_phone 
        ]);

        emotify('success', 'تم تعديل الكورس بنجاح');
        return redirect()->route('courses.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
       
        $course->delete();
        emotify('success', 'تم حذف الكورس بنجاح');
        return redirect()->route('courses.index');

    }
}
