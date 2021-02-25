<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $articles=Article::where(function($q)use($request){
            $q->where('title','LIKE','%'.$request->key.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.articles.index',compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.articles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       Article::create([
        'user_id'=>auth()->user()->id,
        'title'=>$request->title,
        'image'=>$this->upload_file($request->file('image'),'images'),
        'description'=>$request->description,
        'type'=>$request->type
       ]);
       emotify('success', 'تمت الاضافة بنجاح');
        return redirect()->route('articles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('admin.articles.edit',compact('article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        $article->update([
            'title'=>$request->title, 
            'description'=>$request->description,
            'type'=>$request->type
           ]);
        if($request->hasFile('image'))
            $article->update(['image'=>$this->upload_file($request->file('image'),'images')]); 
       emotify('success', 'تم التعديل بنجاح');
        return redirect()->route('articles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        emotify('success', 'تم الحذف بنجاح');
        return redirect()->route('articles.index');
    }
}
