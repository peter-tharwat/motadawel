@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل فيديو : {{$video->title}}</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5 row">
	 		<form class="col-12 col-lg-6" method="POST" action="{{route('videos.update',$video)}}" enctype="multipart/form-data">
	 			@csrf  
	 		 	@method("PUT")
	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				عنوان الفيديو
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{$video['title']}}" required="" min="3" max="255">
	 			</div> 
	 		</div>
	 		
	 		
	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				وصف الفيديو
	 			</div>
	 			<div class="col-9 px-2" >
	 				<textarea class="form-control" name="description" min="3" max="1000" style="min-height: 200px"  required="">{{$video['description']}}</textarea> 
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الصورة المصغرة
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="thumbnail" class="form-control" accept="image/*">
	 				<div class="col-12 py-2">
	 					<img src="{{$video->thumbnail()}}" style="max-width: 100px;">
	 				</div>
	 			</div> 
	 		</div>

	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				مدة الفيديو
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="period" class="form-control" value="{{$video['period']}}" required="" min="3" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				التكلفة
	 			</div>
	 			<div class="col-9 px-2"> 
	 				<select name="cost_type" class="form-control" required="">
	 					<option hidden="" selected="" disabled="">إختر من القائمة</option>
	 					<option value="FREE" @if($video['cost_type']=="FREE") selected="" @endif >مجاني</option>
	 					<option value="PAID" @if($video['cost_type']=="PAID") selected="" @endif >مدفوع</option> 
	 				</select> 
	 			</div> 
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				النوع
	 			</div>
	 			<div class="col-9 px-2"> 
	 				<select name="type" class="form-control" required="" id="video-type" onchange="">
	 					<option hidden="" selected="" disabled="">إختر من القائمة</option>
	 					<option value="LIVE" @if($video['type']=="LIVE") selected="" @endif >مباشر</option>
	 					<option value="RECORDED" @if($video['type']=="RECORDED") selected="" @endif >مسجل</option> 
	 				 
	 				</select> 
	 			</div> 
	 		</div> 
	 		<div class="col-12 px-0  mb-3" id="video-url" 
	 		@if($video['type']!="LIVE")
	 		style="display: none;"
	 		@endif
	 		>
	 			<div class="col-12 px-0 d-flex">
	 				<div class="col-3 px-2 text-start pt-1">
		 				رابط الفيديو
		 			</div>
		 			<div class="col-9 px-2">
		 				<input type="url" name="url" class="form-control" value="{{$video['url']}}" 
		 				@if($video['type']!="LIVE")
				 			disabled="" 
				 		@endif
		 				>
		 			</div> 
	 			</div>
	 			
	 		</div>
	 		<div class="col-12 px-0  mb-3" style="display: none;" id="video-file">
	 			<div class="col-12 px-0 d-flex">
	 				<div class="col-3 px-2 text-start pt-1">
		 				رفع الفيديو
		 			</div>
		 			<div class="col-9 px-2">
		 				<input type="file" name="video" class="form-control" accept="video/mp4" disabled>
		 			</div>  
	 			</div>
	 			
	 		</div>
	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				متاح في
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="datetime-local" name="available_at" class="form-control" value="{{$video['available_at']}}" min="{{date('Y-m-d h:i:s')}}">
	 			</div> 
	 		</div>

	 		<div class="col-12 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				 
	 			</div>
	 			<div class="col-9 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">إعتماد</button>
	 			</div> 

	 		</div>

	 		</form>
	 		<div class="col-12 col-lg-6 ">
	 			<div class="col-12 px-0 pb-3">
	 				الفيديو الحالي
	 			</div>
	 			@include('templates.video',['video'=>$video])
	 		</div>

	 	</div>
	  
	 </div> 
</div>
<script type="text/javascript">
	$('#video-type').on('change',function(){

		if($(this).val()=='LIVE'){
			$('#video-url').fadeIn();$('#video-file').fadeOut();

			$('#video-url input').removeAttr('disabled');$('#video-file input').attr('disabled','disabled');

			$('#video-url input').attr('required','required');
			$('#video-file input').removeAttr('required');

		}else if($(this).val()=='RECORDED'){
			$('#video-url').fadeOut();$('#video-file').fadeIn();

			$('#video-url input').attr('disabled','disabled');$('#video-file input').removeAttr('disabled');

			$('#video-file input').attr('required','required');
			$('#video-url input').removeAttr('required');

		}else if($(this).val()=='OFFLINE'){
			$('#video-url').fadeOut();$('#video-file').fadeOut();

			$('#video-url input').attr('disabled','disabled');$('#video-file input').attr('disabled','disabled');


			$('#video-url input').removeAttr('required');
			$('#video-file input').removeAttr('required');
		}

	});

</script>
@endsection