@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>الدورات الحضورية</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">الدورات الحضورية</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="courses-area-style ptb-100">
         <div class="container">
            <div class="row">

               @php
              $courses=\App\Models\Course::orderBy('id','DESC')->where('type','OFFLINE')->withCount('ratings')->withSum('ratings','rate')->paginate(12);
              @endphp

              @foreach($courses as $course)
               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                        <img src="{{$course->image()}}" alt="Image">
                     </a>
                     <div class="course-content">
                 
                        <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                           <h3>{{$course->title}}</h3>
                        </a>
                       
                        <p>{{mb_strimwidth(trim(strip_tags($course->description)), 0, 45, "...")}}</p>
                     </div>
                  </div>
               </div>
               @endforeach



               
               <div class="col-lg-12 col-md-12">
                  {{$courses->links()}}
               </div>
            </div>
         </div>
      </section>
@endsection