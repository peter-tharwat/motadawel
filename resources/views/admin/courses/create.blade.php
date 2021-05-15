@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>إضافة كورس</h4>
	 	</div>
	 	<div class="col-12  px-3 py-5">
	 		<form class="col-12 row d-flex" method="POST" action="{{route('courses.store')}}" enctype="multipart/form-data">
	 			@csrf 
	 		<div class="col-9">
	 			<div class="col-12 px-0 pb-2">
		 			<div class=" px-2 text-start pb-2" style="width: 100px;">
		 				عنوان الكورس
		 			</div>
		 			<div class="col px-2">
		 				<input type="" name="title" class="form-control" value="{{old('title')}}" required="" min="3" max="255">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 pb-2" >
		 			<div class=" px-2 text-start pb-2" style="width: 100px;">
		 				وصف الكورس
		 			</div>
		 			<div class="col px-2" >
		 				<textarea class="form-control" name="description" min="3" max="1000" style="min-height: 200px"  required="" id="editor">{{old('description')}}</textarea> 
		 			</div> 
		 		</div>  
	 		</div>
	 		

	 		<div class="col-3">

	 			<div class="col-12 px-0 pb-2">
		 			<div class="col-12 pb-2 px-0 py-2">
		 				النوع
		 			</div>
		 			<div class="col-12 px-0"> 
		 				<select name="type" class="form-control" required="" id="course-type"  >
		 					<option hidden="" selected="" disabled="">إختر من القائمة</option>
		 					<option value="LIVE" @if(old('LIVE')) selected="" @endif >مباشر</option>
		 					<option value="RECORDED" @if(old('RECORDED')) selected="" @endif >مسجل</option> 
		 					<option value="OFFLINE" @if(old('OFFLINE')) selected="" @endif >دورة حضورية</option> 
		 				</select> 
		 			</div> 
		 		</div> 

	 			<div class="col-12 px-0 pb-2 whatsapp_phone" style="display: none;">
		 			<div class="col-12 pb-2 px-0 py-2" style="width: 100px;">
		 				الواتس آب
		 			</div>
		 			<div class="col-12 px-0">
		 				<input  name="whatsapp_phone" class="form-control whatsapp_phone"  value="{{old('whatsapp_phone')}}" style="display: none;">
		 			</div> 
		 		</div>

	 			<div class="col-12 px-0 pb-2">
		 			<div class="col-12 pb-2 px-0 py-2" style="width: 100px;">
		 				متاح في
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="datetime-local" name="available_at" class="form-control" value="{{old('price')}}" min="{{date('Y-m-d h:i:s')}}">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 pb-2 accept_payments_untill" style="display: none;">
		 			<div class="col-12 pb-2 px-0 py-2" style="width: 100px;">
		 				الحجز متاح حتى
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="datetime-local" name="accept_payments_untill" class="form-control accept_payments_untill"  min="{{date('Y-m-d h:i:s')}}" style="display: none;">
		 			</div> 
		 		</div>
		 		

		 		


		 		<div class="col-12 px-0 pb-2">
		 			<div class="col-12 pb-2 px-0 py-2" style="width: 100px;">
		 				الصورة المصغرة
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="file" name="image" class="form-control" accept="image/*">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-0 pb-2">
		 			<div class="col-12 pb-2 px-0 py-2" style="width: 100px;">
		 				البانر
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="file" name="banner" class="form-control" >
		 			</div> 
		 		</div>
		 		
		 		<div class="col-12 px-0 pb-2 course_price" style="display: none;">
		 			<div class="col-12 pb-2 px-0 py-2" style="width: 100px;">
		 				سعر الكورس
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="number" name="price" class="form-control course_price" min="0" max="10000" value="{{old('price')}}" style="display: none;">
		 			</div> 
		 		</div>

	 		</div>
	 		
	 		
	 		
	 		

	 		<div class="col-12 px-0 pb-2">
	 		 
	 			<div class="col-12 px-0">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">إعتماد</button>
	 			</div> 

	 		</div>

	 		</form>

	 	</div>
	  
	 </div> 
</div>
<script type="text/javascript"> 

		//course_price
		//whatsapp_phone
		//accept_payments_untill
		$('#course-type').on('change',function(){ 

			if($(this).val()=="LIVE"){
				$('.course_price').fadeIn(0);
				$('.whatsapp_phone').fadeOut(0);
				$('.accept_payments_untill').fadeIn(0); 
			}else if ($(this).val()=="RECORDED"){
				$('.course_price').fadeIn(0);
				$('.whatsapp_phone').fadeOut(0);
				$('.accept_payments_untill').fadeIn(0); 
			}else if ($(this).val()=="OFFLINE"){
				$('.course_price').fadeOut(0);
				$('.whatsapp_phone').fadeIn(0);
				$('.accept_payments_untill').fadeOut(0); 
			} 
		}); 
</script>
@endsection