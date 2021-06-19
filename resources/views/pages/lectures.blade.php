@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>محاضرتنا التعليمية</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">المحاضرات التعليمية</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="courses-area-style ptb-100">
         <div class="container">

            <div class="row">

               @php 
               $lectures = \App\Models\Lecture::orderBy('id','DESC')->paginate(9);
               @endphp
               @foreach($lectures as $lecture)
               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <div class="course-content">
					  <div class="">
						<iframe width="100%" height="345" src="https://www.youtube.com/embed/{{$lecture->video_code()}}?controls=1&rel=0&showinfo=0&color=white" allowfullscreen>
						</iframe>
					 </div>
                        <a href="#"> <h3 class="pt-2">{{$lecture->title}}</h3></a>
                        {{-- <p> {{mb_strimwidth(trim(strip_tags( $lecture->description)), 0, 45, "...")}}</p> --}}
                      {{--   <ul class="lessons">
                           <li>{{\Carbon::parse($lecture->created_at)->diffForHumans()}}</li> 
                        </ul> --}}
                     </div>
                  </div>
               </div>
               @endforeach 
               <div class="col-lg-12 col-md-12">
                  <div class="pagination-area">
                     {{$lectures->links()}}
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection