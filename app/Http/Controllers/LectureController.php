<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $lectures=Lecture::where(function($q)use($request){
            $q->where('title','LIKE','%'.$request->key.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.lectures.index',compact('lectures'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.lectures.create');

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
            'description'=>'required|min:3|max:1000',
            'url'=>'required|url'
        ]);
        $lecture = Lecture::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'url'=>$request->url
        ]); 
        emotify('success', 'تم إضافة المحاضرة بنجاح');
        return redirect()->route('lectures.index');

/*                user_id
title
description
url*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function show(Lecture $lecture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function edit(Lecture $lecture)
    {
        return view('admin.lectures.edit',compact('lecture'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lecture $lecture)
    {
        $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3|max:1000',
            'url'=>'required|url'
        ]);
        $lecture->update([ 
            'title'=>$request->title,
            'description'=>$request->description,
            'url'=>$request->url
        ]);
        emotify('success', 'تم تعديل الدورة بنجاح');
        return redirect()->route('lectures.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lecture  $lecture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lecture $lecture)
    {
       
        $lecture->delete();
        emotify('success', 'تم حذف الدورة بنجاح');
        return redirect()->route('lectures.index');

    }
}
