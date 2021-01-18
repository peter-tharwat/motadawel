<?php

namespace App\Http\Controllers;

use App\Models\PartnerFeature;
use Illuminate\Http\Request;

class PartnerFeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partner_features=PartnerFeature::where(function($q)use($request){
            $q->where('title','LIKE','%'.$request->key.'%');
            if($request->partner_id!=null)
            $q->where('partner_id',$request->partner_id);
        })->orderBy('id','DESC')->paginate();
        return view('admin.partners-features.index',compact('partner_features'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $request->validate(['partner_id'=>'exists:partners,id']);
        $partner=\App\Models\Partner::where('id',$request->partner_id)->firstOrFail();
        return view('admin.partners-features.create',compact('partner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['partner_id'=>'exists:partners,id','title'=>"required|min:3"]);
        $partners_feature = PartnerFeature::create([
            'user_id'=>auth()->user()->id,
            'partner_id'=>$request->partner_id,
            'title'=>$request->title
        ]); 
        emotify('success', 'تم إضافة الميزة بنجاح');
        return redirect()->route('partners-features.index',['partner_id'=>$request->partner_id]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartnerFeature  $partners_feature
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerFeature $partners_feature)
    {
        /*dd($partners_feature);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartnerFeature  $partners_feature
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerFeature $partners_feature)
    { 
        return view('admin.partners-features.edit',compact('partners_feature'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartnerFeature  $partners_feature
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerFeature $partners_feature)
    {   
        $partner_feature=$partners_feature;
        $request->validate(['partner_id'=>'exists:partners,id','title'=>"required|min:3"]);
        $partners_feature->update([  
            'title'=>$request->title
        ]);
        emotify('success', 'تم تعديل الميزة بنجاح');
        return redirect()->route('partners-features.index',['partner_id'=>$partner_feature->partner_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartnerFeature  $partners_feature
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerFeature $partners_feature)
    {
        $partners_feature->delete();
        emotify('success', 'تم حذف الميزة بنجاح');
        return back();
    }
}
