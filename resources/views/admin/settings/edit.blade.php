@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	@php 
	$setting=\App\Models\Setting::first(); 
	@endphp

	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل الإعدادات</h4>
	 	</div>

	 	<div class="col-12  px-3 py-5 row d-flex">
	 		<form class="col-12 row" method="POST" action="{{route('settings.update',$setting)}}" enctype="multipart/form-data">
	 			@csrf 
	 			@method("PUT")


	 			


















	 		<div class="col-12 col-lg-9 px-0">


	 			

		 	{{-- 	<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 				
		 			</div>
		 			<div class="col-12 px-2" >
		 				<hr>
		 			</div> 
		 		</div> --}}

		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	فيديو
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="url" name="youtube_video_link" class="form-control" value="{{$setting->youtube_video_link}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 				نبذة 
		 			</div>
		 			<div class="col-12 px-2" >
		 				<textarea class="form-control " name="bio" id="editor"  style="min-height: 600px;direction: rtl;">{{$setting->bio}}</textarea> 
		 			</div> 
		 		</div>

		 		
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 				شروط الاستخدام
		 			</div>
		 			<div class="col-12 px-2" >
		 				<textarea class="form-control editor" name="terms" id="editor2"  style="min-height: 600px;direction: rtl;">{{$setting->terms}}</textarea> 
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 				سياسة الخصوصية
		 			</div>
		 			<div class="col-12 px-2" >
		 				<textarea class="form-control editor" name="privacy" id="editor3"  style="min-height: 600px;direction: rtl;">{{$setting->privacy}}</textarea> 
		 			</div> 
		 		</div>



		 		




		 		





		 		




		 		

		 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
		 			 
		 			<div class="col-12 px-2">
		 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">إعتماد</button>
		 			</div> 

		 		</div>

	 		</div>
	 		<div class="col-12 col-lg-3 px-0">


	 		


	 			<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	بريد التواصل
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="email" name="email" class="form-control" value="{{$setting->email}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	رقم التواصل
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="phone" class="form-control" value="{{$setting->phone}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	رقم واتس آب
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="whatsapp_phone" class="form-control" value="{{$setting->whatsapp_phone}}" >
		 			</div> 
		 		</div>

		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 				
		 			</div>
		 			<div class="col-12 px-2" >
		 				<hr>
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	رابط تويتر
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="twitter_link" class="form-control" value="{{$setting->twitter_link}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	رابط سناب شات
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="snap_link" class="form-control" value="{{$setting->snap_link}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	رابط انستجرام
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="instagram_link" class="form-control" value="{{$setting->instagram_link}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	رابط يوتيوب
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="youtube_link" class="form-control" value="{{$setting->youtube_link}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 				
		 			</div>
		 			<div class="col-12 px-2" >
		 				<hr>
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	لماذا نحن
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="why_chart" class="form-control" value="{{$setting->why_chart}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	الهدف
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="target" class="form-control" value="{{$setting->target}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	الرسالة
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="message" class="form-control" value="{{$setting->message}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	الرؤية
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="vision" class="form-control" value="{{$setting->vision}}" >
		 			</div> 
		 		</div>
		 	 




	 		{{-- <div class="col-12  px-0  mb-3">
	 			<div class="col-12 px-2 pb-3 pt-1" >
	 				الصورة المصغرة
	 			</div>
	 			<div class="col-12 px-2">
	 				<input type="file" name="image" class="form-control" accept="images/*">
	 				 
	 			</div> 
	 		</div>
	 	 

	 		<div class="col-12 px-0 mb-3">
	 			<div class="col-12 px-2 pb-3 pt-1" >
	 				نوع المقال
	 			</div>
	 			<div class="col-12 px-2">
	 				<select name="type" class="form-control" required=""> 
	 					
	 						<option value="NEWS" @if($setting->type=="NEWS") selected="" @endif>خبر</option> 
	 						<option value="setting" @if($setting->type=="setting") selected="" @endif>مقال</option> 
	 						<option value="setting" @if($setting->type=="IDEAS") selected="" @endif>آراء وتحليلات</option> 

	 				</select> 
	 			</div> 
	 		</div> --}}

 
	 	 
	 		

	 	</div>

	 		</form>

	 	</div>


	  
	  
	 </div> 
</div>
@endsection