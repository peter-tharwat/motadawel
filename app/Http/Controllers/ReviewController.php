<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $reviews=Review::where(function($q)use($request){
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

        $course=\App\Models\Course::where('id',$request->course_id)->firstOrFail();
         
        if($course->has_access_to_rate_course()){
            $user_rating = $course->ratings()->where('user_id',auth()->user()->id)->first();
            if($user_rating !=null){
                $course->ratings()->where('user_id',auth()->user()->id)->update([
                    'course_id'=>$request->course_id,
                    'rate'=>$request->rate,
                    'description'=>$request->description
                ]); 
            }else{
                \App\Models\CourseReview::create([
                    'course_id'=>$request->course_id,
                    'user_id'=>auth()->user()->id,
                    'rate'=>$request->rate,
                    'description'=>$request->description
                ]); 
            }
        }
        emotify('success', 'تم التقييم بنجاح');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review)
    {
        //
    }
}
