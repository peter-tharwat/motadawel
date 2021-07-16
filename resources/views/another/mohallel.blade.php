@extends('layouts.app')
@section('content')
@php 
$mohallel = \App\Models\Mohallel::first();
$videos   = \App\Models\MohallelVideo::orderBy('id','DESC')->get();
@endphp

<div class="modal fade" id="exampleModalx" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">عرض الفيديو</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="col-12 px-0">
           <div class="col-12">
              <iframe id="ytplayer" type="text/html"  style="width:100%;height: 500px;" src="" frameborder="0"></iframe>
           </div>
        </div>
      </div>

      {{-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> --}}
    </div>
  </div>
</div>


<div class="col-12 py-4 my-4 my-lg-5  py-lg-5">
         <div class="container py-4">
            <div class="col-12 px-0 py-2 py-lg-5 row d-flex m-0">
               <div class="col-12 col-lg-8 px-2 py-4">
                  <div class="col-lg-12 px-0">
                     <div class="education-content">
                        <span class="top-title" >{{$mohallel->sub_title}}</span>
                        <h2 style="color: #f16327;font-weight: bold;"> {{$mohallel->title}}</h2>
                        <p>{{$mohallel->description}}</p>

                        <div class="row">
                           <div class="col-lg-6">
                              <ul>
                                 @php 
                                 $main_features=collect(explode(PHP_EOL, $mohallel->main_features));
                                 @endphp
                                 @foreach($main_features as $main_feature)
                                 <li>
                                    <i class="bx bx-check"></i>
                                  {{$main_feature}}
                                 </li>
                                 @endforeach
                              </ul>
                           </div>
      
                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-12 col-lg-4 px-2 d-flex justify-content-end py-4">
                  <img src="{{$mohallel->image()}}" style="max-width: 100%;max-height: 400px;">
               </div>
            </div>
            <div class="col-12 px-0">
               <hr>
            </div>
            <div class="col-12 px-0 py-2 py-lg-5 row d-flex m-0">
               <div class="col-12 col-lg-6 px-2 py-4 row m-0">
                  <div class="col-lg-12">
                     <div class="education-content py-3">
                        <h2 style="color: #f16327;font-weight: bold;" class="font-3 font-lg-7 pt-4">محتوياتها</h2>
                     <div class="row">
                        <div class="col-12 row px-0 mx-0">
                           @php 
                           $features=collect(explode(PHP_EOL, $mohallel->features));
                           @endphp
                           @foreach($features as $feature)
                           <div class="col-12 col-lg-6 py-3" style="color:#232323">
                              <i class="fas fa-check-circle" style="color: #f16327;font-size: 20px;"></i>
                            {{$feature}}
                           </div>
                           @endforeach
                        </div>
                     </div>
                        
                     </div>
                  </div>

               </div>
               <div class="col-12 col-lg-6 px-2 d-flex  py-4">
                  <div class="col-12 mx-0">
                      <h2 style="color: #f16327;font-weight: bold;" class="font-3 font-lg-7 pt-5">متطلبات تحميل المنصة </h2>
                      <div class="col-12 py-4">
                         <div class="col-12 font-3 row m-0" style="color:#2c2b3f">
                           @foreach($videos as $video)
                           <div class="col-12  pt-1 pb-2 my-2" style="border-bottom:1px solid #f1f1f1 "  data-bs-toggle="modal" data-bs-target="#exampleModalx" >
                              <a href="#"  onclick="$('#ytplayer').attr('src','https://www.youtube.com/embed/{{$video->video_url()}}?autoplay=0')"  style="color:#2c2b3f;padding-left: 30px;" data-bs-trigger="hover" data-bs-toggle="popover"  data-bs-placement="right" data-bs-content="{{$video->description}}">
                                 <span class="fas fa-play-circle" ></span> {{$video->title}}
                              </a>
                           </div>
                           @endforeach
                         </div>
                      </div>
                  </div>
               </div>
            </div>



            
         </div>
      </div>
      <script type="text/javascript">
         var myModalEl = document.getElementById('exampleModalx')
         myModalEl.addEventListener('hidden.bs.modal', function (event) {
           $('#ytplayer').attr('src','');
         });   
      </script>
{{--       <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>منصة المحلل الفني الإحترافي</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">المحلل الفني الإحترافي</li>
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
                     <h2> <span>حول منصة المحلل الفني الإحترافي</span></h2>
                     <p>هي مساحة عمل صممها وأشرف عليها المدرب والمحلل الفني أبو رسيل الثقفي والهدف منها 
					 فلترة الفرص وتجهيزها حسب أهم معايير التحليل الفني ومفاهيمه المعروفة، وتعتبر أداة ووسيلة احترافية مساعدة للمحلل الفني في إتخاذ القرار</p>

                     <div class="row">
                        <div class="col-lg-6">
                           <ul>
                              <li>
                                 <i class="bx bx-check"></i>
                                ضارب بفعالية
                              </li>
                              <li>
                                 <i class="bx bx-check"></i>
                              كن صاحب القرار
                              </li>
                              <li>
                                 <i class="bx bx-check"></i>
                              وبإسلوب فريد
                              </li>
                           </ul>
                        </div>
   
                     </div>
                  </div>
               </div>
               <div class="col-lg-6">
					<div class="event-area-two">
				   <div class="">
						<iframe width="560" height="315" src="https://www.youtube.com/embed/gSfX7Q-J0ik" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
					 </div>
				</div>
			</div>
            </div>
         </div>
      </section>
	<section class="education-area ebeef5-bg-color">
   <div class="container-fluid p-0">
      <div class="row">
         <div class="col-lg-6">
            <div class="education-img">
               <img src="assets/img/education-img.png" alt="Image">
            </div>
         </div>
         <div class="col-lg-6">
            <div class="education-content ptb-100">
               <h2>محتويات المنصة</h2>
			   <div class="row">
					<div class="col-lg-6">
						<ul>
                  <li>
                     <i class="bx bx-check"></i>
                     شريط  الدعوم والمقاومات للمؤشر العام 
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة المراقبة الدقيقة 
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة الاختراقات
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة تبادل الادوار
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة استراتيجيات الصعود
                  </li>
				  <li>
                     <i class="bx bx-check"></i>
                      قائمة الشاشة الاسبوعية 
                  </li>
				  <li>
                     <i class="bx bx-check"></i>
                     قائمة الفيبوناتشي
                  </li>
               </ul>
					</div>
					<div class="col-lg-6">
						<ul>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة الكسر
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة  تبادل الكســر 
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                      قائمة استراتيجيات الهبوط
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة تقرير الشموع 
                  </li>
                  <li>
                     <i class="bx bx-check"></i>
                     قائمة جميع الاسهم
                  </li>
				  <li>
                     <i class="bx bx-check"></i>
                      اشارات في جميع القوائم 
                  </li>
               </ul>
					</div>
			   </div>
               <div class="row">
				<div class="col-lg-2"></div>
				<div class="col-lg-8"><a href="/subscriptions" class="default-btn">اشتراك الآن </a></div>
				<div class="col-lg-2"></div>
			   </div>
               
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
						   <h2>تابعنا على منصات التواصل الإجتماعي</h2>
						</div>
						<div class="Social-media">
						  <a href="https://www.snapchat.com/"><i class="bx bxl-snapchat"></i></a>
						  <a href="https://twitter.com/login?lang=ar"><i class="bx bxl-twitter"></i></a>
						  <a href="https://www.youtube.com/?hl=ar"><i class="bx bxl-youtube"></i></a>
						  <a href="https://api.whatsapp.com/send/?phone=966540523144&amp;text&amp;app_absent=0"><i class="bx bxl-whatsapp"></i></a>
						  <a href="https://www.instagram.com/"><i class="bx bxl-instagram-alt"></i></a>
						  
						</div>
				</div>
			</div>
		</div>
	  </section> --}}


@endsection