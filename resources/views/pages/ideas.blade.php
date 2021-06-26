@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>أراء وتحليلات</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">أراء وتحليلات</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="event-area-style pt-100 pb-70">
   <div class="container">
      <div class="section-title">
         <span>تحليلات</span>
         <h2>آخر الاراء والتحليلات</h2>
      </div>
      <div class="row">
         @php
         $articles=\App\Models\Article::where('type','IDEAS')->orderBy('id','DESC')->paginate(4); 
         @endphp
         @foreach($articles as $article)
         <div class="col-lg-6 col-sm-6">
            <div class="single-event border rounded" >
               <a href="/idea/{{$article->id}}-{{str_replace(' ', '-', $article->title)}}">
               <img src="{{$article->image()}}" alt="Image" style="max-width: 100%;" class="rounded">
               </a>
               <div class="event-content d-block position-relative p-3" style="top:0px!important">
                  <ul>
                     <li>
                        <i class="bx bx-calendar"></i>
                        {{\Carbon::parse($article->created_at)->format('Y-m-d')}} 
                     </li>
                     <li>
                        <i class="bx bx-time"></i>
                        {{\Carbon::parse($article->created_at)->format('h:i')}}
                     </li>
                  </ul>
                  <a href="/idea/{{$article->id}}-{{str_replace(' ', '-', $article->title)}}">
                     <h3 style="font-size:1.3rem">{{$article->title}}</h3>
                  </a>
                  
               </div>
            </div>
         </div>
         @endforeach
        {{--  <div class="col-lg-6 col-sm-6">
            <div class="single-event">
               <a href="single-analysis.html">
               <img src="assets/img/analysis.png" alt="Image">
               </a>
               <div class="event-content">
                  <ul>
                     <li>
                        <i class="bx bx-calendar"></i>
                       13-8-2021
                     </li>
                     <li>
                        <i class="bx bx-time"></i>
                        5:00AM
                     </li>
                  </ul>
                  <a href="single-analysis.html">
                     <h3>هل الاسواق المالية مربحة ؟</h3>
                  </a>
                  
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-sm-6">
            <div class="single-event">
               <a href="single-analysis.html">
               <img src="assets/img/analysis.png" alt="Image">
               </a>
               <div class="event-content">
                  <ul>
                     <li>
                        <i class="bx bx-calendar"></i>
                       13-8-2021
                     </li>
                     <li>
                        <i class="bx bx-time"></i>
                        5:00AM
                     </li>
                  </ul>
                  <a href="single-analysis.html">
                     <h3>هل الاسواق المالية مربحة ؟</h3>
                  </a>
                  
               </div>
            </div>
         </div>
         <div class="col-lg-6 col-sm-6">
            <div class="single-event">
               <a href="single-analysis.html">
               <img src="assets/img/analysis.png" alt="Image">
               </a>
               <div class="event-content">
                  <ul>
                     <li>
                        <i class="bx bx-calendar"></i>
                       13-8-2021
                     </li>
                     <li>
                        <i class="bx bx-time"></i>
                        5:00AM
                     </li>
                  </ul>
                  <a href="single-analysis.html">
                     <h3>هل الاسواق المالية مربحة ؟</h3>
                  </a>
                  
               </div>
            </div>
         </div> --}}
         <div class="col-12 px-0 py-3">
            {{$articles->links()}}
         </div>
      </div>
   </div>
</section>
@endsection