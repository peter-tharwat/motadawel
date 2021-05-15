@extends('layouts.app')
@section('content')
@php 
$setting=\App\Models\Setting::first();
@endphp
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>معلومات عنا</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">من نحن</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="education-area-two ptb-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-6">
                  <div class="education-content">
                     <span class="top-title">طريقك نحو النجاح</span>
                     <h2>لماذا انضم لدورات عبر الإنترنت مع <span>فكرة شارت</span> ؟ </h2>
                     <div class="col-12 main-font-inside">
                     	{{$setting->why_chart}}
                     </div>
                     <div class="row">
                        <div class="col-lg-6">
                           <ul>
                              <li>
                                 <i class="bx bx-check"></i>
                                 تعلم
                              </li>
                              <li>
                                 <i class="bx bx-check"></i>
                                طبق
                              </li>
                           </ul>
                        </div>
                        <div class="col-lg-6">
                           <ul>
                              <li>
                                 <i class="bx bx-check"></i>
                                 تفاعل
                              </li>
                              <li>
                                 <i class="bx bx-check"></i>
                                 اربح
                              </li>
                           </ul>
                        </div>
                     </div>
                     <a href="/courses" class="default-btn">
                     عرض جميع الدورات التدربية
                     </a>
                  </div>
               </div>
               <div class="col-lg-6">
                  <div class="education-img-wrap">
                     <div class="education-img-2" style="margin-top:70px">
                        <img src="assets/img/aboutimg.jpg" alt="Image">
                     </div>
                    
                  </div>
               </div>
            </div>
         </div>
      </section>
	  <section class="tutor-area pt-100 pb-70 jarallax" data-jarallax='{"speed": 0.3}'>
	   <div class="container">
		  <div class="section-title">
			 <span>حولنا</span>
			 <h2>أهدافنا، رسالتنا، رؤيتنا</h2>
		  </div>
		  <div class="row">
			 <div class="col-lg-4 col-sm-6">
				<div class="single-tutor custom">
				   <i class="flaticon-instructor-1"></i>
				   <h3>أهدافنا</h3>
				   <div class="main-font-inside">
				   	{{$setting->target}}
				   </div>
				</div>
			 </div>
			 <div class="col-lg-4 col-sm-6">
				<div class="single-tutor custom">
				   <i class="flaticon-instructor"></i>
				   <h3>رسالتنا</h3>
				   <div class="main-font-inside">
				   	{{$setting->message}}
				   </div>
				</div>
			 </div>
			 <div class="col-lg-4 col-sm-6">
				<div class="single-tutor custom">
				   <i class="flaticon-certificate-1"></i>
				   <h3>رؤيتنا</h3>
				   <div class="col-12">
				   	{{$setting->vision}}
				   </div>
				</div>
			 </div>

		  </div>
	   </div>
	</section>

	<section class="counter-area  pt-100 pb-70">
	   <div class="container">
		  <div class="row">
			 <div class="col-lg-3 col-sm-6">
				<div class="single-counter">
				   <div class="counter-shape shape-1">
					  <img src="/assets/img/counter-shape/counter-shape-1.png" alt="Image" class="m-auto">
					  <h2>
						 <span class="odometer" data-count="100">00</span>
						 <span class="target">%</span>
					  </h2>
				   </div>
				   <p>معدل النجاح</p>
				</div>
			 </div>
			 <div class="col-lg-3 col-sm-6">
				<div class="single-counter">
				   <div class="counter-shape shape-2">
					  <img src="/assets/img/counter-shape/counter-shape-1.png" alt="Image" class="m-auto">
					  <h2>
						 <span class="odometer" data-count="{{\App\Models\User::count()}}">00</span>
					  </h2>
				   </div>
				   <p>عدد الطلاب</p>
				</div>
			 </div>
			 <div class="col-lg-3 col-sm-6">
				<div class="single-counter">
				   <div class="counter-shape shape-3">
					  <img src="/assets/img/counter-shape/counter-shape-1.png" alt="Image" class="m-auto">
					  <h2>
						 <span class="odometer" data-count="{{\App\Models\Lecture::count()}}">00</span>
					  </h2>
				   </div>
				   <p>عدد المحاضرات التدربية</p>
				</div>
			 </div>
			 <div class="col-lg-3 col-sm-6">
				<div class="single-counter">
				   <div class="counter-shape shape-4">
					  <img src="/assets/img/counter-shape/counter-shape-1.png" alt="Image" class="m-auto">
					  <h2>
						 <span class="odometer" data-count="{{\App\Models\Course::count()}}">00</span>
					  </h2>
				   </div>
				   <p>عدد الدورات</p>
				</div>
			 </div>
		  </div>
	   </div>
	</section>
@endsection