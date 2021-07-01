@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>شريك النجاح المتداول</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">شركاء النجاح</li>
               </ul>
            </div>
         </div>
      </div>
      <div class="single-blog-area single-course-area ptb-100">
         <div class="container">
            <div class="row">
				<div class="col-lg-2"> </div>
               <div class="col-lg-8">
				<div class="custom-card">
                  <div class="single-blog-content">
                     <div class="blog-top-content">
                        <img src="{{$partner->banner()}}" class="" style="width: 100%;max-height: 100vh" alt="Image">
                        
                        <h3>{{$partner->title}}</h3>
                        
         						<div style="white-space: pre-line;" class="main-font-inside">{!!$partner->description!!}</div>
         						 <ul class="course-list">

                              @foreach($partner->partner_features()->orderBy('id','DESC')->get() as $feature)
                                 <li><i class="bx bx-check"></i> {{$feature->title}}</li>
                              @endforeach

                              @foreach($partner->partner_links()->orderBy('id','DESC')->get() as $link)
                              <a href="{{$link->url}}" style="color: #f16327" class="border d-block  font-3 mb-3 py-2 px-4" target="_blank">
                              
                                 <h2 style="color: #f16327"><i class="fas fa-{{$link->type}}" style="color: #f16327"></i> {{$link->title}}</h2>
                                 
                              </a>
                              @endforeach
									
								 
									
						 </ul>
							<a href="{{$partner->url}}" class="default-btn">دخول الآن</a>						 
                     </div>
                     </div>
                  </div>
				  <div class="custom-card">
				  <p>مشاركة مع المهتمين</p>
          <div class="col-12 pt-2 pb-3">
             <hr>
          </div>
				 
				 <div class="Social-media">
                   
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{\Request::fullUrl()}}"><i class="bx bxl-facebook"></i></a>
                    <a href="https://www.twitter.com/share?url={{\Request::fullUrl()}}"><i class="bx bxl-twitter"></i></a>
                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{\Request::fullUrl()}}"><i class="bx bxl-linkedin"></i></a>
                    <a href="https://wa.me/?text={{\Request::fullUrl()}}"><i class="bx bxl-whatsapp"></i></a>
                   
                    
                  </div>
				  </div>
				  </div>
				<div class="col-lg-2"> </div>
            </div>
         </div>
      </div>
@endsection