@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>شركاء النجاح   </h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">شركاء النجاح     </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="blog-column-three-area ptb-100">
         <div class="container">
			<div class="section-title">
               <span>شركاء نجاحنا</span>
               <h3>دائماً ستجد شركائنا معك حيثما تكون . معك لتقديم الدعم لك و تعزيز عملية التداول الخاصة بك</h3>
            </div>
            <div class="row">
               @php 
               $partners=\App\Models\Partner::orderBy('id','DESC')->get();
               @endphp
               @foreach($partners as $partner)
            <div class="col-lg-3 col-md-6">
                  <div class="single-news">
                     <a href="/partner/{{$partner->id}}-{{str_replace(' ', '-', $partner->title)}}">
                        <img src="{{$partner->image()}}" alt="Image">
                     </a>
                     <div class="news-content"> 
                        <a href="/partner/{{$partner->id}}-{{str_replace(' ', '-', $partner->title)}}">
                           <h3>{{$partner->title}}</h3>
                        </a>
                        
                     </div>
                  </div>
               </div>
               @endforeach
             
               {{-- <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-partner.html">
                     <img src="assets/img/partner.png" alt="Image">
                     </a>
                     <div class="news-content">
                       
                        <a href="single-partner.html">
                           <h3>شريك النجاح المتداول الناجح</h3>
                        </a>
                        
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-partner.html">
                     <img src="assets/img/partner.png" alt="Image">
                     </a>
                     <div class="news-content">
                       
                        <a href="single-partner.html">
                           <h3>شريك النجاح المتداول الناجح</h3>
                        </a>
                        
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-partner.html">
                     <img src="assets/img/partner.png" alt="Image">
                     </a>
                     <div class="news-content">
                       
                        <a href="single-partner.html">
                           <h3>شريك النجاح المتداول الناجح</h3>
                        </a>
                        
                     </div>
                  </div>
               </div> --}}
             {{--   <div class="col-lg-12 col-md-12">
                  <div class="pagination-area">
                     <span class="page-numbers current" aria-current="page">1</span>
                     <a href="#" class="page-numbers">2</a>
                     <a href="#" class="page-numbers">3</a>
                     <a href="#" class="page-numbers">4</a>
                     <a href="#" class="next page-numbers">
                     <i class="bx bx-chevron-right"></i>
                     </a>
                  </div>
               </div> --}}
            </div>
         </div>
      </div>
@endsection