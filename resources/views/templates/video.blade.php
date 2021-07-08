@if(isset($video))
	@if($video->has_access_to_video())
	<div class="col-12 px-0">
		@if($video->type=="LIVE")
		<div class="col-12 px-0">
			<div class="col-12 px-0">
				<div class="col-12 px-0 d-flex justify-content-center">
	                <a href="{{$video->url()}}"  > 
	                   <button class="default-btn px-4">رابط ZOOM</button>
	                </a>
	             </div> 
			</div>
		</div>
		@elseif($video->type=="RECORDED")
		<div class="col-12 px-0"> 

		 	<link href="https://vjs.zencdn.net/7.11.4/video-js.css" rel="stylesheet" />
			  <video
			    id="current-playing-video"
			    class="video-js"
			    controls
			    preload="auto"
			    style="width: 100%;min-height: 400px;"
			    {{-- poster="MY_VIDEO_POSTER.jpg" --}}
			    data-setup='{ "playbackRates": [0.5, 0.75 , 1, 1.5, 2, 4] }'
			  >
			    <source src="{{$video->url()}}" type="video/mp4" />
			    {{-- <source src="MY_VIDEO.webm" type="video/webm" /> --}}
			    <p class="vjs-no-js">
			      لعرض الفيديو برجاء تفعيل جافاسكريبت او إستخدام متصفح أحدث
			      {{-- 

			      <a href="https://videojs.com/html5-video-support/" target="_blank"
			        >supports HTML5 video</a> --}}
			    </p>
			  </video>
			  <script src="https://vjs.zencdn.net/7.11.4/video.min.js"></script>
			

			{{-- <video controls contextmenu class="col-12 px-0" src="{{$video->url()}}" controlsList="nodownload">
				<source src="{{$video->url()}}" type="video/mp4">
			</video> --}}
		</div>
		@elseif($video->type=="OFFLINE")
		<div class="col-12 px-0">
			<div class="col-12 px-0 font-2">
				دورة حضورية ! 
			</div>
		</div>
		@endif
	</div>
	@else
	<div class="col-12 px-0 py-3">
		<div class="col-12 px-0 font-2 py-3 text-center">	
			@if($video->course->accept_payments_untill < date('Y-m-d h:i:s'))

			غير متاح الاشتراك في هذه الدورة في الوقت الحالي

			@else
			تحتاج إلى الاشتراك في الدورة لعرض المحاضرة

			<div class="col-12 px-0 text-center d-flex justify-content-center py-3">

			<a href="/checkout?type=COURSE&type_id={{$video->course_id}}"  > 
               <button class="default-btn px-4">الاشتراك في الدورة</button>
            </a> 
            @endif

			</div>
		</div>
	</div>
	@endif
@endif