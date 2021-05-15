@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>مقالات موقع فكرة شارت   </h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">مقالاتنا    </li>
               </ul>
            </div>
         </div>
      </div>
      <div class="blog-column-three-area ptb-100">
         <div class="container">
            <div class="row">
               @php 
               $articles=\App\Models\Article::whereIn('type',['NEWS','ARTICLE'])->orderBy('id','DESC')->paginate(12);
               @endphp 
               @foreach($articles as $article)
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="/article/{{$article->id}}-{{str_replace(' ', '-', $article->title)}}">
                     <img src="{{$article->image()}}" alt="Image" style="width: 100%;">
                     </a>
                     <div class="news-content">
                        <span class="tag">مقال</span>
                        <a href="/article/{{$article->id}}-{{str_replace(' ', '-', $article->title)}}">
                           <h3>{{$article->title}}</h3>
                        </a>
                        
                        <ul class="lessons">
                          {{--  <li>نشر: <a href="#">أحمد محمد </a></li> --}}
                           <li class="float">{{\Carbon::parse($article->created_at)->diffForHumans()}}</li>
                        </ul>
                     </div>
                  </div>
               </div>
               @endforeach
             {{--  <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-blog.html">
                     <img src="assets/img/blog.jpg" alt="Image">
                     </a>
                     <div class="news-content">
                        <span class="tag">الاقتصاد</span>
                        <a href="single-blog.html">
                           <h3>كيف تحدد جمهورك المستهدف في 6 خطوات</h3>
                        </a>
                        
                        <ul class="lessons">
                           <li>نشر: <a href="#">أحمد محمد </a></li>
                           <li class="float">منذ 3 قائق</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-blog.html">
                     <img src="assets/img/blog.jpg" alt="Image">
                     </a>
                     <div class="news-content">
                        <span class="tag">الاقتصاد</span>
                        <a href="single-blog.html">
                           <h3>كيف تحدد جمهورك المستهدف في 6 خطوات</h3>
                        </a>
                        
                        <ul class="lessons">
                           <li>نشر: <a href="#">أحمد محمد </a></li>
                           <li class="float">منذ 3 قائق</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-blog.html">
                     <img src="assets/img/blog.jpg" alt="Image">
                     </a>
                     <div class="news-content">
                        <span class="tag">الاقتصاد</span>
                        <a href="single-blog.html">
                           <h3>كيف تحدد جمهورك المستهدف في 6 خطوات</h3>
                        </a>
                        
                        <ul class="lessons">
                           <li>نشر: <a href="#">أحمد محمد </a></li>
                           <li class="float">منذ 3 قائق</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-blog.html">
                     <img src="assets/img/blog.jpg" alt="Image">
                     </a>
                     <div class="news-content">
                        <span class="tag">الاقتصاد</span>
                        <a href="single-blog.html">
                           <h3>كيف تحدد جمهورك المستهدف في 6 خطوات</h3>
                        </a>
                        
                        <ul class="lessons">
                           <li>نشر: <a href="#">أحمد محمد </a></li>
                           <li class="float">منذ 3 قائق</li>
                        </ul>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="single-blog.html">
                     <img src="assets/img/blog.jpg" alt="Image">
                     </a>
                     <div class="news-content">
                        <span class="tag">الاقتصاد</span>
                        <a href="single-blog.html">
                           <h3>كيف تحدد جمهورك المستهدف في 6 خطوات</h3>
                        </a>
                        
                        <ul class="lessons">
                           <li>نشر: <a href="#">أحمد محمد </a></li>
                           <li class="float">منذ 3 قائق</li>
                        </ul>
                     </div>
                  </div>
               </div> --}}
               <div class="col-lg-12 col-md-12 py-4"> 
                  {{$articles->links()}}
               </div>
            </div>
         </div>
      </div>
 @endsection