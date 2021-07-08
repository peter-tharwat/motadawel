@extends('layouts.app')
@section('content')
@php 
$setting=\App\Models\Setting::first();
@endphp
	  <div class="banner-area-two " id="home" style="margin: 6% 0 5% 0%!important">

         <div class="hero-slider-item slide2">
          <div class="d-table">
               <div class="d-table-cell">
                  <div class="container">
                                      <div class="row align-items-center">
                     <div class="col-lg-6">
                        <div class="slider-content">
                           <h1 style="line-height: 1.3;color: #f16327;font-weight: bold;" class="wow fadeInLeft font-3 font-lg-6" data-wow-delay="0.5s">فكرة شارت بوابتك إلى اللأسواق المالية العالمية</h1>
                           <p style="line-height: 2.5" class="wow fadeInLeft font-2 mt-3" data-wow-delay="0.6s">شارك في الندوات الإلكترونية والحلقات التعليمية واستمتع بتعليم تفاعلي وتعرف على كيفية  التداول بسهولة مع بعض الأسهم الأكثر شعبية في العالم باستخدام الرافعة المالية التي تتيح لك زيادة استثماراتك بما يصل إلى 20 مرة.</p>
                           <a href="/courses" class="default-btn wow fadeInLeft mt-4" data-wow-delay="0.9s">
                           عرض المحاضرات التعليمية
                           </a>
                        </div>
                     </div>
                     <div class="col-lg-6">
                        <div class="banner-img wow fadeInRight" data-wow-delay="0.3s" >
                           <img src="/assets/img/home.png" alt="Image">
                           <div class="banner-shape-1">
                              <img src="/assets/img/10.png" alt="Image">
                           </div>
                           <div class="banner-shape-2">
                              <img src="/assets/img/10.png" alt="Image">
                           </div>
                         
                           
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
	<section class=" event-area-two event-area-style ptb-100">
	   <div class="container">
		<div class="section-title">
			<span>لماذا تختارنا</span>
			 <h2>اكتشف تجربة التداول الأجمل</h2>
			<img src="/assets/img/section-title-shape.png" alt="Image">
	 </div>
      <div class="row align-items-center">

         <div class="col-lg-6">
            <div class="row">
               <div class="col-lg-6 col-sm-6">
                  <div class="single-tutor one">
                    <img src="/assets/img/experience.png">
                     <h3>خبرة</h3>
                     <p>نقوم بتدريبك على منصات الأسواق المالية من خلال رؤى وأدوات تداول مجانية</p>
                  </div>
               </div>
               <div class="col-lg-6 col-sm-6">
                  <div class="single-tutor two">
                     <img src="/assets/img/skill.png">
                     <h3>مهارة</h3>
                     <p>مدربنا من أفضل المدربين في المجال حيث حاصل على شهادات عالمية ومحلية في مجال تداول العملات</p>
                  </div>
               </div>
               <div class="col-lg-6 col-sm-6">
                  <div class="single-tutor three">
                     <img src="/assets/img/shield.png">
                     <h3>أمان</h3>
                     <p>تعرقف على منصات التداول الأشهر في العالم وكيفية العمل عليها والتعامل معها</p>
                  </div>
               </div>
               <div class="col-lg-6 col-sm-6">
                  <div class="single-tutor four">
                     <img src="/assets/img/developing.png">
                     <h3>فعالية</h3>
                     <p>تعليم ودعم شخصي لمساعدتك في البدء وسلك طريقك</p>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-6">
            <div class="event-img">
               <img src="/assets/img/whyus.png" alt="Image">
               <div class="video-content">
			   
                  <a href="{{$setting->youtube_video_link}}" class="video-btn popup-youtube">
                     <i class="flaticon-play-button"></i>
                  </a>
               </div>
               <div class="event-shape-1 rotated">
                  <img src="/assets/img/event-img/event-shape-1.png" alt="Image">
               </div>
            </div>
         </div>     
	 </div>
   </div>
</section>

	  <section class="education-area-two ptb-100" style="background-color: #F8F8FB;">
		   <div class="container">
			  <div class="row">
				 <div class="col-lg-6">
					<div class="education-content">
					   <span class="top-title">حول محاضرنا</span>
					   <h2>أبو رسيل الثقفي </h2>
					   <div class="main-font-inside">{!!$setting->bio!!}</div>
					</div>
				 </div>
				 <div class="col-lg-6">
					<div class="education-img-wrap">
					   <div class="education-img-4">
						  <img src="/assets/img/manager1.png" alt="Image">
					   </div>
					   <div class="education-shape-1">
						  <img src="/assets/img/10.png" alt="Image" data-wow-delay="0.5s">
					   </div>
					   <div class="education-shape-2">
						  <img src="/assets/img/10.png" alt="Image"data-wow-delay="0.5s">
					   </div>
					</div>
				 </div>
			  </div>
		   </div>
		</section>
      <section class="categories-area ptb-100" >
         <div class="container">
            <div class="section-title">
               <span>اقسامنا</span>
               <h2>أبرز الأقسام </h2>
               <img src="/assets/img/section-title-shape.png" alt="Image">
            </div>
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="single-categories">
                     <img src="/assets/img/2.png" alt="Image">
                     <div class="categories-content-wrap">
                        <div class="categories-content">
                           <a href="/courses">
                              <h3>الدورات المتاحة</h3>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="single-categories">
                     <img src="/assets/img/1.png" alt="Image">
                     <div class="categories-content-wrap">
                        <div class="categories-content">
                           <a href="/partners">
                              <h3>شركاء النجاح</h3>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="single-categories">
                     <img src="/assets/img/3.png" alt="Image">
                     <div class="categories-content-wrap">
                        <div class="categories-content">
                           <a href="/mohallel">
                              <h3>منصة المحلل الفني الإحترافية</h3>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>

      <section class="feedback-area ptb-100"style="background-color: #F8F8FB;">
         <div class="container">
            <div class="section-title">
               <span>أراء العملاء</span>
               <h2>ماذا يقول عملائنا عنا</h2>
               <img src="/assets/img/section-title-shape.png" alt="Image">
            </div>
            <div class="feedback-slider owl-theme owl-carousel">
               @php 
               $reviews=\App\Models\CourseReview::orderBy('id','DESC')->where('featured','1')->whereNotNull('description')->limit(20)->get();
               @endphp
               @foreach($reviews as $review)
               <div class="feedback-item">
                  <i class="flaticon-quotation"></i>
                  <p>{{$review->description}}</p>
                  <div class="d-flex justify-content-center col-12 row">
                     <div class="col-12 d-flex justify-content-center"> 
                     <img src="{{$review->user->getUserAvatar()}}" alt="Image" style="width: 60px;" class="d-inline-block">
                     </div>
                     <h3 class="col-12">{{$review->user->name}}</h3>
                     <div class="col-12"> 
                        @include('templates.stars',['score'=>$review->rate])
                     </div>
                  </div>
               </div>
               @endforeach

              {{--  <div class="feedback-item">
                  <i class="flaticon-quotation"></i>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                  <div class="feedback-title">
                     <img src="/assets/img/feedback-img/feedback-img-2.jpg" alt="Image">
                     <h3>Juhon Dew</h3>
                     <span>Marketer </span>
                  </div>
               </div>
               <div class="feedback-item">
                  <i class="flaticon-quotation"></i>
                  <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet.</p>
                  <div class="feedback-title">
                     <img src="/assets/img/feedback-img/feedback-img-3.jpg" alt="Image">
                     <h3>Kilva Smith</h3>
                     <span>Designer</span>
                  </div> --}}
               </div>
            </div>
         </div>
         <div class="feedback-shape-1">
            <img src="/assets/img/feedback-img/feedback-shape-1.png" alt="Image">
         </div>
         <div class="feedback-shape-2">
            <img src="/assets/img/feedback-img/feedback-shape-2.png" alt="Image">
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

	  <section class="ptb-70">
	  <div class="container">
            <div class="row">
				<div class="col-lg-12 col-sm-6">
					    <div class="section-title">
						   <span>تابعنا</span>
						   <h2>تابعنا على منصات التواصل اللإجتماعي</h2>
						   <img src="/assets/img/section-title-shape.png" alt="Image">
						</div>
						<div class="Social-media">
                     @if($setting->twitter_link!=null)
                    <a href="{{$setting->twitter_link}}"><i class="bx bxl-twitter"></i></a>
                    @endif
                    @if($setting->snap_link!=null)
                    <a href="{{$setting->snap_link}}"><i class="bx bxl-snapchat"></i></a>
                    @endif
                    @if($setting->instagram_link!=null)
                    <a href="{{$setting->instagram_link}}"><i class="bx bxl-instagram-alt"></i></a>
                    @endif
                    @if($setting->whatsapp_phone!=null)
                    <a href="https://api.whatsapp.com/send/?phone={{$setting->whatsapp_phone}}&amp;text&amp;app_absent=0"><i class="bx bxl-whatsapp"></i></a>
                    @endif
                    @if($setting->youtube_link)
                    <a href="{{$setting->youtube_link}}"><i class="bx bxl-youtube"></i></a>
                    @endif
                    @if($setting->telegram_link!=null)
                    <a href="{{$setting->telegram_link}}"><i class="fab fa-telegram" style="color:#2196f3"></i></a>
                    @endif
                  </div>
				</div>
			</div>
		</div>
	  </section>
@endsection