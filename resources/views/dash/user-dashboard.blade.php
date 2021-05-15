@extends('layouts.user-dash')
@section('content')

<section class="dashboard-area">
         <div class="dashboard-content-wrap">
            <div class="dashboard-bread dashboard-bread-2">
               <div class="container-fluid">
                  <div class="row align-items-center">
                     <div class="col-lg-6">
                        <div class="breadcrumb-content">
                           <div class="section-heading">
                              <h2 class="sec__title font-size-30">لوحة التحكم</h2>
                           </div>
                        </div>
                        <!-- end breadcrumb-content -->
                     </div>
                     <!-- end col-lg-6 -->
                     <div class="col-lg-6">
                        <div class="breadcrumb-list">
                           <ul class="list-items d-flex justify-content-end">
                              <li><a href="/" class="text-white">الصفحة الرئيسية</a></li>
                             
                              <li>لوحة التحكم</li>
                           </ul>
                        </div>
                        <!-- end breadcrumb-list -->
                     </div>
                     <!-- end col-lg-6 -->
                  </div>
                  <!-- end row -->
                  <div class="row mt-4 ">
                     <div class="col-lg-4 responsive-column-l ">
                        <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                           <div class="d-flex pb-3 justify-content-between">
                              <div class="info-content">
                                 <p class="info__desc">دوراتي</p>
                                 <h4 class="info__title">{{\App\Models\Course::whereHas('order',function($q){
                                      $q->where([
                                        'user_id'=>auth()->user()->id,
                                        'status'=>"DONE",
                                        'type'=>"COURSE"
                                      ]);
                                    })->count()}}</h4>
                              </div>
                              <!-- end info-content -->
                              <div class="info-icon icon-element bg-4">
                                 <i class='bx bx-book'></i>
                                 
                              </div>
                              <!-- end info-icon-->
                           </div>
                           <div class="section-block"></div>
                           <a href="/user/courses" class="d-flex align-items-center justify-content-between view-all"> مشاهدة الكل<i class="la la-angle-left"></i></a>
                        </div>
                     </div>
                     <!-- end col-lg-3 -->
                     <div class="col-lg-4 responsive-column-l">
                        <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                           <div class="d-flex pb-3 justify-content-between">
                              <div class="info-content">
                                 <p class="info__desc">مدفوعاتي</p>
                                 <h4 class="info__title">{{\App\Models\Payment::where(
                                    ['status'=>"DONE",'user_id'=>auth()->user()->id]
                                 )->count()}}</h4>
                              </div>
                              <!-- end info-content -->
                              <div class="info-icon icon-element bg-4">
                                 <i class='bx bx-cart'></i>
                              </div>
                              <!-- end info-icon-->
                           </div>
                           <div class="section-block"></div>
                           <a href="/user/subscriptions" class="d-flex align-items-center justify-content-between view-all">مشاهدة الكل <i class="la la-angle-left"></i></a>
                        </div>
                     </div>
					 <div class="col-lg-4 responsive-column-l">
                        <div class="icon-box icon-layout-2 dashboard-icon-box pb-0">
                           <div class="d-flex pb-3 justify-content-between">
                              <div class="info-content">
                                 <p class="info__desc">فواتيري</p>
                                 <h4 class="info__title">{{\App\Models\Payment::where(
                                    [
                                       ['status','=',"DONE"],
                                       ['user_id','=',auth()->user()->id],
                                       ['amount','>','0']
                                    ] 
                                 )->count()}}</h4>
                              </div>
                              <!-- end info-content -->
                              <div class="info-icon icon-element bg-4">
                                 <i class='bx bx-list-check'></i>
                              </div>
                              <!-- end info-icon-->
                           </div>
                           <div class="section-block"></div>
                           <a href="/user/invoices" class="d-flex align-items-center justify-content-between view-all">مشاهدة الكل <i class="la la-angle-left"></i></a>
                        </div>
                     </div>
                  </div>
                  <!-- end row -->
               </div>
            </div>
			

            <!-- end dashboard-main-content -->
         </div> 
</section>
@endsection