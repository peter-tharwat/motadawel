@extends('layouts.user-dash')
@section('content')
<section class="dashboard-area">
         
               <!-- end dashboard-nav -->
          <div class="dashboard-content-wrap">
              <div class="dashboard-bread dashboard--bread dashboard-bread-2">
                  <div class="container-fluid">
                      <div class="row align-items-center">
                          <div class="col-lg-6">
                              <div class="breadcrumb-content">
                                  <div class="section-heading">
                                      <h2 class="sec__title font-size-30">دوراتي</h2>
                                  </div>
                              </div><!-- end breadcrumb-content -->
                          </div><!-- end col-lg-6 -->
                          <div class="col-lg-6">
                              <div class="breadcrumb-list">
                                  <ul class="list-items d-flex justify-content-end">
                                      <li><a href="/" class="text-white">الصفحة الرئيسية</a></li>
                                      <li>لوحة التحكم</li>
                                      <li>دوراتي</li>
                                  </ul>
                              </div><!-- end breadcrumb-list -->
                          </div><!-- end col-lg-6 -->
                      </div><!-- end row -->
                  </div>
              </div><!-- end dashboard-bread -->
              <div class="dashboard-main-content">
                  <div class="container-fluid">
                      <div class="row">
                          <div class="col-lg-12">
                              <div class="form-box">
                                  <div class="form-title-wrap">
                                      <div class="d-flex align-items-center justify-content-between">
                                          <h3 class="title">الدورات</h3>
                                         
                                      </div>
                                  </div>
                                  <div class="form-content pb-2 row d-flex">
                                    @php 
                                    $courses=\App\Models\Course::whereHas('order',function($q){
                                      $q->where([
                                        'user_id'=>auth()->user()->id,
                                        'status'=>"DONE",
                                        'type'=>"COURSE"
                                      ]);
                                    })->with(['ratings'=>function($q){
                                      $q->where('user_id',auth()->user()->id);
                                    }])->orderBy('id','DESC')->paginate(); 
                                    @endphp
                                    @foreach($courses as $course)
                                       <div class="col-lg-4 col-md-6">
                                          <div class="single-course">
                                             <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                                              <img src="{{$course->image()}}" alt="Image">
                                             </a>
                                             <div class="course-content">
                                                <span class="price" style="position: relative;left: 0px">${{$course->price}}</span>
                                                <span class="tag">الدورات التعليمية</span>
                                                <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                                                   <h3>{{$course->title}}</h3>
                                                </a>
                                                   
                                                <div class="col-12 px-0 py-3">
                                                  <p style="border-bottom: 0px">{{mb_strimwidth(trim(strip_tags($course->description)), 0, 45, "...")}}</p>
                                                </div>
                                                
                                             </div>
                                          </div>
                                       </div>

                                      @endforeach
                                       
                                  </div>
                              </div><!-- end form-box -->
                          </div><!-- end col-lg-12 -->
                      </div><!-- end row -->
                      <div class="row">
                          <div class="col-lg-12">
                             <div class="col-12 py-2">
                                 {{$courses->links()}}
                               </div>
                          </div>
                      </div>
                  </div><!-- end container-fluid -->
              </div><!-- end dashboard-main-content -->
          </div><!-- end dashboard-content-wrap -->
      </section><!-- end dashboard-area -->
@endsection