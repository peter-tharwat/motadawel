@extends('layouts.app')
@section('content')
@php
$setting=\App\Models\Setting::first();
@endphp
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>الاشتراكات</h2>
               <ul>
                  <li>
                     <a href="index.html">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">الاشتراكات</li>
               </ul>
            </div>
         </div>
      </div>
	  <section class="education-area-two ptb-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <div class="education-content">
                    <div class="col-12 px-0 row d-flex">
                        <div class="col-12 col-md-8">
                            <span class="top-title">طريقك نحو النجاح</span>
                            <h2> <span>اشترك معنا في منصة المحلل الفني</span></h2>
                        </div>
                        <div class="col-12 col-md-4 text-start text-md-end py-3 py-md-0 ">
                            <a href="/checkout?type=MOHALLEL&mohallel_type=FREE">
                                <span class="default-btn py-2" style="cursor: pointer;border-radius: 90px">تجربة مجانية</span>
                            </a>
                        </div>
                    </div>
                     
                     <p>اتبع الخطوات التالية: </p>

                     <div class="row">
                        <div class="col-lg-12">
                           <ul>
                            {{--   <li>
                                 <i class="bx bx-check"></i>
                                قم بتعبئة النموذج التالي  <a href="https://docs.google.com/forms/d/1id1s6JvS2s4Tnx2lEjQ7eBFcawUjwFLhK-2q5IY5upY/viewform?edit_requested=true">أضغط هنا</a>
                              </li> --}}
                              <li>
                                 <i class="bx bx-check"></i>
                               قم بإختيار خطة الاشتراك
							   
                              </li>
							  <li>
                                 <i class="bx bx-check"></i>
                               قم بإجراءات الدفع
							   
                              </li>
							  
                           </ul>
                        </div>
   
                     </div>
                  </div>
               </div>
              
            </div>
         </div>
      </section>
<section class="package-area   pb-70 text-center">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
               <div class="section-title">
			 <h2>اختيار خطة الدفع</h2> </div>
            </div><!-- end col-lg-12 -->
        </div><!-- end row -->

        {{-- whatsapp_phone_mohallel --}}



 
        <div class="row padding-top-80px">
            <div class="col-lg-4 p-0">
                <div class="package-card">
                    <div class="package-title">
                        <h2 class="package__title">الباقة الذهبية</h2>
                        <h3 class="package__price"><span>RSA</span>{{$setting->package1_price}}</h3>
                        <h5 class="package__month">كل ستة أشهر</h5>
                        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path></svg>
                    </div><!-- end package-title -->
                    <div class="col-12" style="white-space: pre-line;">{!! $setting->package1_description!!}</div> 
                    <div class="btn-box">
                        <a href="/checkout?type=MOHALLEL&mohallel_type=package1" class="theme-btn">اشترك الآن</a>
                    </div>
                </div><!-- end package-card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 p-0">
                <div class="package-card package-card-active">
                    <div class="package-title">
                        <h2 class="package__title">الباقة الماسية</h2>
                        <h3 class="package__price"><span>RSA</span>{{$setting->package2_price}}</h3>
                        <h5 class="package__month">كل سنة</h5>
                        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path></svg>
                    </div><!-- end package-title -->
                    <div class="col-12" style="white-space: pre-line;">{!!$setting->package2_description!!}</div> 
                    <div class="btn-box">
                        <a href="/checkout?type=MOHALLEL&mohallel_type=package2" class="theme-btn">اشترك الآن</a>
                    </div>
                </div><!-- end package-card -->
            </div><!-- end col-lg-4 -->
            <div class="col-lg-4 p-0">
                <div class="package-card">
                    <div class="package-title">
                        <h2 class="package__title">الباقة البرونزية</h2>
                        <h3 class="package__price"><span>RSA</span>{{$setting->package3_price}}</h3>
                        <h5 class="package__month">كل ثلاثة أشهر</h5>
                        <svg class="hero-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 10" preserveAspectRatio="none"><path d="M0 10 0 0 A 90 59, 0, 0, 0, 100 0 L 100 10 Z"></path></svg>
                    </div><!-- end package-title -->
                     <div class="col-12" style="white-space: pre-line;">{!!$setting->package3_description!!}</div> 
                    <div class="btn-box">
                        <a href="/checkout?type=MOHALLEL&mohallel_type=package3" class="theme-btn">اشترك الآن</a>
                    </div>
                </div><!-- end package-card -->
            </div><!-- end col-lg-4 -->
        </div><!-- end row -->
    </div><!-- end container -->
</section>
@endsection