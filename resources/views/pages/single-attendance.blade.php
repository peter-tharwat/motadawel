@extends('layouts.app')
@section('content')
<style>
   .description-of-article *{
      font-family: var(--font-family)!important;
      line-height: 2;
   }
</style>
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>{{$course->title}}</h2>
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
      <div class="single-blog-area single-course-area ptb-100">
         <div class="container">
            <div class="row">
				<div class="col-lg-2"></div>
               <div class="col-lg-8">
				<div class="custom-card">
                  <div class="single-blog-content">
                     <div class="blog-top-content">
                        <div class="col-12">
                           <img src="{{$course->banner()}}" class="col-12" alt="Image">
                        </div>
                        
                        
                        <h3>{{$course->title}}</h3> 
						      <div class="description-of-article col-12">{!!$course->description!!}</div>
                        <div class="col-12 py-2">
                           <a href="https://wa.me/{{$course->whatsapp_phone}}">
                              <button class="btn default-btn">واتس آب</button>
                           </a>
                        </div>
					{{-- 	 <a href="https://api.whatsapp.com/send/?phone=966540523144&text&app_absent=0"" class="default-btn">اشترك الآن</a>		 --}}		 
                     </div>
                     </div>
                  </div>
				 
				  </div>
				<div class="col-lg-2"></div>
            </div>
         </div>
      </div>
@endsection