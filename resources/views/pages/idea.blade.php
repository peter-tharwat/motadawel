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
               <h2>{{$article->title}}</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">اراء وتحليلات</li>
               </ul>
            </div>
         </div>
      </div>

      <div class="single-blog-area single-course-area ptb-100 " >
         <div class="container">
            <div class="row">
               <div class="col-lg-8 mx-auto p-4" style="    box-shadow: 0px 0px 19px #e8e8e8;border-radius: 10px;">
                  
               
               <div class="" style="">
                  <div class="single-blog-content">
                        <div class="blog-top-content">
                           <img src="{{$article->image()}}" alt="Image" style="max-width: 100%;">
                           <span class="research">آراء وتحليلات</span>
                           <h3>{{$article->title}}</h3>
                           <div class="post-details"> 
                                 {{\Carbon::parse($article->created_at)->diffForHumans()}} 
                           </div>
                           <div class="col-12 px-0 description-of-article pb-4" >
                              {!!$article->description!!}
                           </div>
   						 </div>
                 </div>
   			   </div>
               </div>
               {{-- <div class="col-lg-4">
                  <div class="widget-sidebar">
                     <div class="sidebar-widget categories">
                        <h3>الأقسام</h3>
                        <ul>
                           <li>
                              <a href="#">مقالات</a>
                           </li>
                           <li>
                              <a href="#">آخبار</a>
                           </li>
                           <li>
                              <a href="#">آراء وتحليلات</a>
                           </li>
                           <li>
                              
                           </li> 
                     </div> 
                  </div>
               </div> --}}
            </div>
         </div> 
      </div>

@endsection