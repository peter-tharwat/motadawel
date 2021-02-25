<?php

namespace App\Http\Controllers;

use App\Models\CourseReview;
use Illuminate\Http\Request;

class CourseReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews=CourseReview::where(function($q)use($request){
            //$q->where('title','LIKE','%'.$request->key.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.reviews.index',compact('reviews'));
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
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function show(CourseReview $courseReview)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function edit(CourseReview $review)
    {
       return view('admin.reviews.edit',compact('review'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CourseReview $review)
    { 
      
        $review->update([
            'description'=>$request->description,
            'rate'=>$request->rate,
            'reviewed'=>$request->reviewed==1?1:0,
            'featured'=>$request->featured==1?1:0
        ]);
        emotify('success', 'تم التعديل بنجاح');
        return redirect()->route('reviews.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CourseReview  $courseReview
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseReview $courseReview)
    {
        $courseReview->delete();
        emotify('success', 'تم الحذف بنجاح');
        return redirect()->route('reviews.index');
    }
}
