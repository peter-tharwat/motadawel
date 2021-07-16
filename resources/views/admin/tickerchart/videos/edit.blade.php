@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4 row" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل فيديو</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('tickerchart-videos.update',$tickerchart_video)}}" enctype="multipart/form-data">
	 			@csrf 
	 			@method("PUT")
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				عنوان الفيديو
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{$tickerchart_video->title}}" required="" min="3" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الصورة المصغرة
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="small_image" class="form-control"  >
	 				<div class="col-12 px-0 py-2">
	 					<img src="{{$tickerchart_video->small_image()}}" style="width:100%;">
	 				</div>
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				رابط الفيديو
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="video_url" class="form-control" value="{{$tickerchart_video->video_url}}"  required="" placeholder="من يوتيوب ..">
	 				<div class="col-12 px-0 py-2">
	 					<iframe id="ytplayer" type="text/html"  style="width:100%;height: 250px;" 
				  		src="https://www.youtube.com/embed/{{$tickerchart_video->video_url()}}?autoplay=0"
				  		frameborder="0"></iframe>
	 				</div>
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				نوع الفيديو
	 			</div>
	 			<div class="col-9 px-2">
	 				<select class="form-control" name="video_type">
	 					<option value="OPEN_ACCOUNT" @if($tickerchart_video->video_type=="OPEN_ACCOUNT") selected="" @endif>شرح طريقة فتح الحساب</option>
	 					<option value="DEAL_WITH_PLATFORM" @if($tickerchart_video->video_type=="DEAL_WITH_PLATFORM") selected="" @endif>شرح طريقة التعامل على المنصة</option>
	 				</select>
	 			</div> 
	 		</div>
	 		{{-- <div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الرابط
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="url" class="form-control" value="{{old('url')}}"  >
	 			</div> 
	 		</div> --}}
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				 
	 			</div>
	 			<div class="col-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">إعتماد</button>
	 			</div> 

	 		</div>
	 		</form>

	 	</div>

	 	
	  
	 </div> 
</div>
@endsection