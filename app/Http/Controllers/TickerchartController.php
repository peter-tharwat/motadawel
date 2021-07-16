<?php

namespace App\Http\Controllers;

use App\Models\Tickerchart;
use Illuminate\Http\Request;

class TickerchartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickerchart=\App\Models\Tickerchart::first();
       return view('admin.tickerchart.edit',compact('tickerchart'));
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
     * @param  \App\Models\Tickerchart  $tickerchart
     * @return \Illuminate\Http\Response
     */
    public function show(Tickerchart $tickerchart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tickerchart  $tickerchart
     * @return \Illuminate\Http\Response
     */
    public function edit(Tickerchart $tickerchart)
    {
        $tickerchart=\App\Models\Tickerchart::first();
        return view('admin.tickerchart.edit',compact('tickerchart'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tickerchart  $tickerchart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tickerchart $tickerchart)
    {

        if($request->hasFile("image")){
            $image=$this->upload_file($request->image,'/uploads/tickerchart/','public');
            $tickerchart->update(['image'=>$image]);
        }
        if($request->hasFile("logo")){
            $image=$this->upload_file($request->logo,'/uploads/tickerchart/','public');
            $tickerchart->update(['logo'=>$image]);
        }
        $tickerchart->update([
            'title'=>$request->title,
            'open_account_title'=>$request->open_account_title,
            'open_account_link'=>$request->open_account_link,
            'telegram_link'=>$request->telegram_link,
            'visual_guide_link'=>$request->visual_guide_link
        ]);
        emotify('success', 'تم التحديث بنجاح');
        return redirect()->back();
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tickerchart  $tickerchart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tickerchart $tickerchart)
    {

    }
}
