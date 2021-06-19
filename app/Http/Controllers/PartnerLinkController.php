<?php

namespace App\Http\Controllers;

use App\Models\PartnerLink;
use Illuminate\Http\Request;

class PartnerLinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $partner_links=PartnerLink::where(function($q)use($request){
            $q->where('title','LIKE','%'.$request->key.'%');
            if($request->partner_id!=null)
            $q->where('partner_id',$request->partner_id);
        })->orderBy('id','DESC')->paginate();
        return view('admin.partners-links.index',compact('partner_links'));
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
        return view('admin.partners-links.create',compact('partner'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['partner_id'=>'exists:partners,id','title'=>"required|min:3",'url'=>"required|url",'type'=>'required|in:file-pdf,link,file,play']);
        $partners_link = PartnerLink::create([
            'user_id'=>auth()->user()->id,
            'partner_id'=>$request->partner_id,
            'title'=>$request->title,
            'url'=>$request->url,
            'type'=>$request->type
        ]); 
        emotify('success', 'تم إضافة الرابط بنجاح');
        return redirect()->route('partners-links.index',['partner_id'=>$request->partner_id]);
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PartnerLink  $partners_link
     * @return \Illuminate\Http\Response
     */
    public function show(PartnerLink $partners_link)
    {
        /*dd($partners_link);*/
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PartnerLink  $partners_link
     * @return \Illuminate\Http\Response
     */
    public function edit(PartnerLink $partners_link)
    {  
        return view('admin.partners-links.edit',compact('partners_link'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PartnerLink  $partners_link
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PartnerLink $partners_link)
    {   
        $partner_feature=$partners_link;
        $request->validate(['partner_id'=>'exists:partners,id','title'=>"required|min:3",'url'=>"required|url",'type'=>'required|in:file-pdf,link,file,play']);
        $partners_link->update([  
            'title'=>$request->title,
            'url'=>$request->url,
            'type'=>$request->type,
        ]);
        emotify('success', 'تم تعديل الرابط بنجاح');
        return redirect()->route('partners-links.index',['partner_id'=>$partner_feature->partner_id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PartnerLink  $partners_link
     * @return \Illuminate\Http\Response
     */
    public function destroy(PartnerLink $partners_link)
    {
        $partners_link->delete();
        emotify('success', 'تم حذف الرابط بنجاح');
        return back();
    }
}
