@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>إضافة فيديو إلى كورس : {{$course->title}}</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('videos.store')}}" enctype="multipart/form-data"> 
	 			@csrf 
	 		<input type="hidden" name="course_id" value="{{$course->id}}">
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الكورس  
	 			</div>
	 			<div class="col-9 px-2 pt-1">
	 				{{$course->title}}
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				عنوان الفيديو
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{old('title')}}" required="" min="3" max="255">
	 			</div> 
	 		</div>
	 		
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				وصف الفيديو
	 			</div>
	 			<div class="col-9 px-2" >
	 				<textarea class="form-control" name="description" min="3" max="1000" style="min-height: 200px"  required="">{{old('description')}}</textarea> 
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الصورة المصغرة
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="thumbnail" class="form-control" accept="image/*">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				مدة الفيديو
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="period" class="form-control" value="{{old('period')}}" required="" min="3" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				التكلفة
	 			</div>
	 			<div class="col-9 px-2"> 
	 				<select name="cost_type" class="form-control" required="">
	 					<option hidden="" selected="" disabled="">إختر من القائمة</option>
	 					<option value="FREE" @if(old('FREE')) selected="" @endif >مجاني</option>
	 					<option value="PAID" @if(old('PAID')) selected="" @endif >مدفوع</option> 
	 				</select> 
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				النوع
	 			</div>
	 			<div class="col-9 px-2"> 
	 				<select name="type" class="form-control" required="" id="video-type" onchange="">
	 					<option hidden="" selected="" disabled="">إختر من القائمة</option>
	 					<option value="LIVE" @if(old('LIVE')) selected="" @endif >مباشر</option>
	 					<option value="RECORDED" @if(old('RECORDED')) selected="" @endif >مسجل</option> 
	 				</select> 
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0  mb-3" id="video-url" style="display: none;">
	 			<div class="col-12 px-0 d-flex">
	 				<div class="col-3 px-2 text-start pt-1">
		 				رابط الفيديو
		 			</div>
		 			<div class="col-9 px-2">
		 				<input type="url" name="url" class="form-control" value="{{old('url')}}"  >
		 			</div> 
	 			</div>
	 			
	 		</div>
	 		<div class="col-12 col-md-6 px-0  mb-3" style="display: none;" id="video-file">
	 			<div class="col-12 px-0 d-flex">
	 				<div class="col-3 px-2 text-start pt-1">
		 				رفع الفيديو
		 			</div>
		 			<div class="col-9 px-2">
		 				<input type="file" name="video" class="form-control" accept="video/mp4">
		 			</div> 
	 			</div>
	 			
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				متاح في
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="datetime-local" name="available_at" class="form-control" value="{{old('available_at')}}" min="{{date('Y-m-d h:i:s')}}">
	 			</div> 
	 		</div>

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
<script type="text/javascript">
	$('#video-type').on('change',function(){

		if($(this).val()=='LIVE'){
			$('#video-url').fadeIn();$('#video-file').fadeOut();
			$('#video-url input').fadeIn();$('#video-file input').fadeOut();
			$('#video-url input').attr('required','required');
			$('#video-file input').removeAttr('required');

		}else if($(this).val()=='RECORDED'){
			$('#video-url').fadeOut();$('#video-file').fadeIn();
			$('#video-url input').fadeOut();$('#video-file input').fadeIn();
			$('#video-file input').attr('required','required');
			$('#video-url input').removeAttr('required');

		}else if($(this).val()=='OFFLINE'){
			$('#video-url').fadeOut();$('#video-file').fadeOut();
			$('#video-url input').fadeOut();$('#video-file input').fadeOut();
			$('#video-url input').removeAttr('required');
			$('#video-file input').removeAttr('required');
		}

	});

</script>
@endsection