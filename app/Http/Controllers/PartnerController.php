<?php

namespace App\Http\Controllers;

use App\Models\Partner;
use Illuminate\Http\Request;

class PartnerController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partners=Partner::where(function($q)use($request){
            $q->where('title','LIKE','%'.$request->key.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.partners.index',compact('partners'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.partners.create');

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
            'url'=>'required|url',
            'image' => 'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            'banner'=>'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
        ]); 
        $partner = Partner::create([
            'user_id'=>auth()->user()->id,
            'title'=>$request->title,
            'description'=>$request->description,
            'url'=>$request->url,
            'banner'=>$this->upload_file($request->file('banner'),'banners'),
            'image'=>$this->upload_file($request->file('image'),'images'),
        ]); 
        emotify('success', 'تم إضافة الشريك بنجاح');
        return redirect()->route('partners.index');

/*                user_id
title
description
url*/

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function show(Partner $partner)
    {
        dd($partner);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, partner $partner)
    {
        $request->validate([
            'title'=>'required|min:3|max:255',
            'description'=>'required|min:3|max:100000',
            'url'=>'required|url',
            'image' => 'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
            'banner'=>'nullable|sometimes|image|mimes:jpeg,jpg,png,gif|max:10000',
        ]);
        $partner->update([ 
            'title'=>$request->title,
            'description'=>$request->description,
            'url'=>$request->url,
            'banner'=>$request->hasFile('banner')?$this->upload_file($request->file('banner'),'banners'):$partner->banner,
            'image'=>$request->hasFile('image')?$this->upload_file($request->file('image'),'images'):$partner->image,
        ]);

        


        emotify('success', 'تم تعديل الشريك بنجاح');
        return redirect()->route('partners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
       
        $partner->delete();
        emotify('success', 'تم حذف الشريك بنجاح');
        return redirect()->route('partners.index');

    }
}
