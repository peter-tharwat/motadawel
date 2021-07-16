<?php

namespace App\Http\Controllers;

use App\Models\Mohallel;
use Illuminate\Http\Request;

class MohallelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $mohallel=\App\Models\Mohallel::first();
       return view('admin.mohallel.edit',compact('mohallel'));
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
     * @param  \App\Models\Mohallel  $mohallel
     * @return \Illuminate\Http\Response
     */
    public function show(Mohallel $mohallel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mohallel  $mohallel
     * @return \Illuminate\Http\Response
     */
    public function edit(Mohallel $mohallel)
    {
        $mohallel=\App\Models\Mohallel::first();
        return view('admin.mohallel.edit',compact('mohallel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mohallel  $mohallel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mohallel $mohallel)
    {
        if($request->hasFile('image')){
            $image= $this->upload_file($request->image,'/uploads/mohallel/','public');
            $mohallel->update(['image'=>$image]);
        }
        $mohallel->update([
                'title'=>$request->title,
                'sub_title'=>$request->sub_title,
                'description'=>$request->description,
                'main_features'=>$request->main_features,
                'features'=>$request->features
            ]);
        emotify('success', 'تم التحديث بنجاح');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mohallel  $mohallel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mohallel $mohallel)
    {
        //
    }
}
