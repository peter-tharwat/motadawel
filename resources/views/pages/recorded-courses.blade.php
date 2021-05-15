@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>دوراتنا</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">الدورات التدربية</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="courses-area-style ptb-100">
         <div class="container">
            <div class="row">
               @php
              $courses=\App\Models\Course::orderBy('id','DESC')->where('type','RECORDED')->withCount('ratings')->withSum('ratings','rate')->paginate(12);
              @endphp


              @foreach($courses as $course)

              

               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                      <img src="{{$course->image()}}" alt="Image">
                     </a>
                     <div class="course-content">
                        <span class="price">${{$course->price}}</span>
                        <span class="tag">الدورات التعليمية</span>
                        <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                           <h3>{{$course->title}}</h3>
                        </a>
                         <div class="col-12 ">
                           @include('templates.stars',['score'=>($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0,'size'=>14])
                              <span>
                                {{sprintf('%0.2f',($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0)}}</span>
                              <a href="#">(تقييم {{$course->ratings_count}})</a>

                         </div>
                           
                        <div class="col-12 px-0 py-3">
                          <p style="border-bottom: 0px">{{mb_strimwidth(trim(strip_tags($course->description)), 0, 45, "...")}}</p>
                        </div>
                        
                     </div>
                  </div>
               </div>
               @endforeach



               <div class="col-lg-12 col-md-12">
                  {{$courses->links()}}
               {{--    <div class="pagination-area">
                     <span class="page-numbers current" aria-current="page">1</span>
                     <a href="#" class="page-numbers">2</a>
                     <a href="#" class="page-numbers">3</a>
                     <a href="#" class="page-numbers">4</a>
                     <a href="#" class="next page-numbers">
                     <i class="bx bx-chevron-right"></i>
                     </a>
                  </div> --}}
               </div>




            </div>
         </div>
      </section>
@endsection