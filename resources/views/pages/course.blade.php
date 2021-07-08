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
               <h2>{{$course->title}}</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">الدورات التدربية</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="single-course-area  ptb-100">
         <div class="container">
            <div class="row">
               <div class="col-lg-7 custom-card mx-0">
                  <div class="single-course-content ">
                     <h3>{{$course->title}}</h3>
                     <div class="row align-items-center">
                        <div class="col-lg-6 col-sm-4">
                           <div class="course-rating">
                              <img src="/assets/img/manager.png" alt="Image">
                              <h4><a href="#">المحاضر:</a></h4>
                              <span>أبو رسيل الثقفي</span>
                           </div>
                        </div>

                        
                        <div class="col-lg-6 col-sm-4">
                           <div class="course-rating star pl-0">
                              <h4>التقييم</h4>
                              <div class="product-review">
                                 @include('templates.stars',['score'=>($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0,'size'=>14])
                              <span>
                                {{sprintf('%0.2f',($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0)}}</span> 
                                 <a href="#" class="rating-count">( {{$course->ratings_count}} من التقييمات )</a>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="">
                        <div class="col-12 px-0">
                              <img src="{{$course->banner()}}" style="width: 100%;">
                        </div>
					{{-- 	<iframe width="100%" height="300" src="https://www.youtube.com/embed/gSfX7Q-J0ik" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> --}}
					 </div>
                  </div>
                  <div class="tab single-course-tab">
                     <ul class="tabs">
                        <li>
                           <a href="#">معلومات عامة</a>
                        </li>
                        <li>
                           <a href="#">الفيديوهات</a>
                        </li>
                      
                        <li>
                           <a href="#">التقييمات</a>
                        </li>
                     </ul>
                     <div class="tab_content">
                        <div class="tabs_item">
                           <h3>وصف الكورس</h3>
                           <div style="white-space: pre-line;" class="description-of-article main-font-inside">{!!$course->description!!}</div>
                        </div>
                        <div class="tabs_item">
                           <div class="curriculum-content">
                              <h3>فيديوهات الكورس</h3>
                              <div class="curriculum-list"> 
                                 <ul>
                                    @foreach($course->videos as $video )
                                    <li class="get-video-url" data-src="{{$video->id}}" data-type="{{$video->type}}">
										<a href="#product-view-one" data-bs-toggle="modal" class="meet-title "  >
                                       <i class="bx bx-right-arrow"></i>
                                       {{$video->title}}
                                       </a>
									   
                                       <a  href="#product-view-one" data-bs-toggle="modal" class="meet-time ">
                                       <span class="min">{{$video->period}} دقيقة</span>
                                       <span class="preview">عرض</span>
                                       @if($video->cost_type=="FREE")
                                       <span class="fas fa-check"></span>
                                       @elseif($video->cost_type=="PAID" && $video->has_access_to_video())
                                       <span class="fas fa-lock-open"></span>
                                       @elseif($video->cost_type=="PAID" && !$video->has_access_to_video())
                                       <span class="fas fa-lock"></span>
                                       @endif
                                       </a>
                                    </li>
                                    @endforeach
                                 </ul>
                              </div>
                        
                           </div>
                        </div>
                       
                        <div class="tabs_item">
                           <div class="review-content">
                              <h3> التقييمات <span>{{sprintf('%0.2f',($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0)}} ({{$course->ratings_count}} من التقييمات)</span></h3>
                            
                              

                              {{-- <div class="rating-bar-content">
                                 <div class="single-bar">
                                    <p class="start">الوضوح</p>
                                    <div class="rating-bar">
                                       <div class="skills html"></div>
                                    </div>
                                    <p class="percent">90%</p>
                                 </div>
                                 <div class="single-bar">
                                    <p class="start">الجودة</p>
                                    <div class="rating-bar">
                                       <div class="skills css"></div>
                                    </div>
                                    <p class="percent">80%</p>
                                 </div>
                                 <div class="single-bar">
                                    <p class="start">تسلسل الأفكار</p>
                                    <div class="rating-bar">
                                       <div class="skills js"></div>
                                    </div>
                                    <p class="percent">90%</p>
                                 </div>
                                 <div class="single-bar">
                                    <p class="start">الشرح</p>
                                    <div class="rating-bar">
                                       <div class="skills php"></div>
                                    </div>
                                    <p class="percent">80%</p>
                                 </div>
                              </div> --}}

                              <div class="course-reviews-content">
                                 <h3>التقييمات</h3>
                                 <ul class="course-reviews">
                                    @foreach($course->ratings as $review)
                                    <li class="mb-3 border-bottom pb-3">
                                       <img src="{{$review->user->getUserAvatar()}}" alt="Image" style="width: 60px;overflow: hidden;max-height: 60px;border-radius: 50%;">
                                       <h3>{{$review->user->name}} <span class="font-1" style="color:#666">{{\Carbon::parse($review->created_at)->diffForHumans()}}</span></h3>
                                       <p style="display: flex"> @include('templates.stars',['score'=>$review->rate,'size'=>10])</p>
                                       <p>{{$review->description}}</p>
                                    </li>
                                    @endforeach
                                 </ul>
                                 
                              </div> 
                           </div>

                           @php
                           if(auth()->check()){
                              $user_rating= $course->ratings()->where('user_id',auth()->user()->id)->first();
                           }  
                           @endphp

                           
                           @if($course->has_access_to_rate_course())
                           <div class="col-12 px-0 py-3">
                              <form method="POST" action="/rate/create" >
                                 @csrf
                                 <input type="hidden" name="course_id" value="{{$course->id}}" >
                                    <div class="col-12 " style="box-shadow: 0px 0px 23px #d5d5d5;border-radius: 7px;">
                                       <div class="col-12 px-3 py-3 border-bottom">
                                          إضافة تقييم 
                                       </div>
                                       <div class="col-12 px-3"> 
                                          <div class="col-12 py-2">
                                            <label for="customRange1" class="form-label">التقييم</label>
                                          </div>
                                          <div class="col-12">
                                             <input type="range" name="rate" class="form-range border-0" id="customRange1" min="1" max="5" value="{{(isset($user_rating))?$user_rating->rate:'0'}}">
                                             <div class="col-12 justify-between d-flex">

                                                <span class="m-0 font-2 badge bg-success 
                                                " style="font-weight: bold;background: #f16327!important">1</span>
                                                <span class="m-0 font-2 badge bg-success 
                                                " style="font-weight: bold;background: #f16327!important">2</span>
                                                <span class="m-0 font-2 badge bg-success 
                                                " style="font-weight: bold;background: #f16327!important">3</span>
                                                <span class="m-0 font-2 badge bg-success 
                                                " style="font-weight: bold;background: #f16327!important">4</span> 
                                                 <span class="m-0 font-2 badge bg-success " style="font-weight: bold;background: #f16327!important">5</span>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-12 px-3"> 
                                          <div class="col-12 py-2">
                                             تعليقك
                                          </div>
                                          <div class="col-12">
                                             <textarea class="form-control" style="min-height: 130px;" name="description">{{(isset($user_rating))?$user_rating->description:''}}</textarea> 
                                          </div>
                                       </div>
                                       <div class="col-12 px-3 pb-4">  
                                          <div class="col-12">
                                             <button class="default-btn">تقييم</button>
                                          </div>
                                       </div>
                                    </div>

                              </form>
                           </div>
                           @endif


                        </div>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4">
                  <div class="account-wrap">
				  <img src="{{$course->image()}}" alt="Image">
                     <ul>
                        <li>
                           السعر <span class="bold">ريال {{sprintf('%0.2f',$course->price)}}</span>
                        </li>
                        @php 
                     

                     @endphp
                     @if(!$course->has_access_to_course())
                        @if($course->accept_payments_untill> date('Y-m-d h:i:s') && $course->type=="LIVE")
                        <li>
                           متاح للحجز حتى <span>{{
                              \Carbon::parse($course->accept_payments_untill)->format('Y-m-d')
                           }}</span>
                        </li>
                        @endif 
                     </ul>
                     @if($course->accept_payments_untill> date('Y-m-d h:i:s'))
                     <a href="/checkout?type=COURSE&type_id={{$course->id}}" class="default-btn">
                        @if($course->type=="LIVE")
                        أحجز
                        @else 
                        شراء
                        @endif الآن
                     </a>
                     @endif
                     @endif

                     <div class="social-content">
                        <p>
                           مشاركة مع المهتمين
                        </p>
                        <div class="Social-media">
						 
						  <a href="https://www.facebook.com/sharer/sharer.php?u={{\Request::fullUrl()}}"><i class="bx bxl-facebook"></i></a>
						  <a href="https://www.twitter.com/share?url={{\Request::fullUrl()}}"><i class="bx bxl-twitter"></i></a>
						  <a href="https://www.linkedin.com/sharing/share-offsite/?url={{\Request::fullUrl()}}"><i class="bx bxl-linkedin"></i></a>
						  <a href="https://wa.me/?text={{\Request::fullUrl()}}"><i class="bx bxl-whatsapp"></i></a>
						 
						  
						</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
	  
	  
	  	  <div class="modal fade product-view-one" id="product-view-one">
         <div class="modal-dialog">
            <div class="modal-content p-4">
               <button type="button" class="close" data-bs-dismiss="modal" id="close-modal-video">
               <span aria-hidden="true">
               <i class="bx bx-x"></i>
               </span>
               </button>
               <div class="row align-items-center">
                  <div class="col-12 video-response-container"> 
                     
						 
					       </div> 
                  </div>
               </div>
            </div>
         </div>
	  
	  
	  
      <section class="courses-area-style pb-70">
         <div class="container">
            <div class="section-title">
               <h2>دورات أخرى</h2>
            </div>
            <div class="row">

               @php
              $courses=\App\Models\Course::orderBy('id','DESC')->where('type','RECORDED')->withCount('ratings')->withSum('ratings','rate')/*->where('id','<>',$course->id)*/->inRandomOrder()->limit(12)->get();
              @endphp


              @foreach($courses as $course)

              

               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                      <img src="{{$course->image()}}" alt="Image">
                     </a>
                     <div class="course-content">
                        <span class="price" style="display: flex;font-size: .8rem;line-height: 1;text-align: center;justify-content: center;align-items: center;">{{$course->price}}<br>ريال</span>
                        <span class="tag">الدورات التعليمية</span>
                        <a href="/course/{{$course->id}}-{{str_replace(' ', '-', $course->title)}}">
                           <h3>{{$course->title}}</h3>
                        </a>
                         <div class="col-12 ">
                           @include('templates.stars',['score'=>($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0,'size'=>14])
                              <span>
                                {{sprintf('%0.2f',($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0)}}</span>
                              <a href="#">(تقييم {{$course->ratings_count}})</a>

                         </div>
                           
                        <div class="col-12 px-0 py-3">
                          <p style="border-bottom: 0px">{{mb_strimwidth(trim(strip_tags($course->description)), 0, 45, "...")}}</p>
                        </div>
                        
                     </div>
                  </div>
               </div>
               @endforeach


              
            </div>
         </div>
      </section>
      <script type="text/javascript">

         $('#product-view-one').on('hidden.bs.modal', function (e) {
           /*var video = document.getElementById('current-playing-video'); */
           var myPlayer = videojs('current-playing-video');
            myPlayer.pause();
         });

         
         $('.get-video-url').on('click',function(){
            var self=this;
            $.ajax({
              method: "POST",
              url: "{{route('get_video_access_url')}}",
              data: { id: $(this).data('src'),'_token':'{{csrf_token()}}'}
            })
              .done(function( msg ) {
               $('.video-response-container').empty().append(msg);

               /*if($(self).data('type')=="LIVE"){
                  $('#fixed-video').fadeOut(0);
                  $('#zoom-link').fadeIn(0);
                  $('#zoom-link').attr('href',msg.url);

               }else{
                  $('#fixed-video').fadeIn(0);
                  var video = document.getElementById('fixed-video');
                  var source = document.getElementById('source-fixed-video');

                  source.setAttribute('src', '{{env('APP_URL')}}'+msg.url);
                  video.load();
                  video.play();
               }*/



               

               /*$('.video-real-src').attr('src',msg.url); */
              });

          /*  alert();*/
         }); 
      </script>
@endsection
