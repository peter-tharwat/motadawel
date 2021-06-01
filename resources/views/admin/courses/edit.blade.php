@extends('layouts.admin')
@section('content')
<style type="text/css">
	.course_price{
		display: {{$course->type=="OFFLINE"?'none':'block'}};
	}
	.whatsapp_phone{
		display: {{$course->type=="OFFLINE"?'block':'none'}}
	}
	.accept_payments_untill{
		display: {{$course->type=="OFFLINE"?'none':'block'}};
	}
</style>
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل كورس النجاح</h4>
	 	</div>
	 	<div class="col-12  px-3 py-5">
	 		<form class="col-12 d-flex row" method="POST" action="{{route('courses.update',$course)}}" enctype="multipart/form-data">
	 			@csrf
	 			@method("PUT")
	 		<div class="col-9">
	 			<div class="col-12 px-2 py-2">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				عنوان الكورس
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="" name="title" class="form-control" value="{{$course->title}}" min="3" max="255">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-2 py-2">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				وصف الكورس
		 			</div>
		 			<div class="col-12 px-0">
		 				<textarea type="" name="description" class="form-control" min="3" max="1000" style="min-height: 200px" id="editor">{{$course->description}}</textarea>
		 			</div> 
		 		</div> 
	 		</div>
	 		<div class="col-3">
	 			<div class="col-12 px-2 py-2">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				النوع
		 			</div>
		 			<div class="col-12 px-0"> 
		 				<select name="type" class="form-control" required="" id="course-type" onchange="">
		 					<option hidden="" selected="" disabled="">إختر من القائمة</option>
		 					<option value="LIVE" @if($course['type']=="LIVE") selected="" @endif >مباشر</option>
		 					<option value="RECORDED" @if($course['type']=="RECORDED") selected="" @endif >مسجل</option> 
		 					<option value="OFFLINE" @if($course['type']=="OFFLINE") selected="" @endif >دورة حضورية</option> 
		 				</select> 
		 			</div> 
		 		</div> 
		 		


	 			<div class="col-12 px-2 py-2 course_price">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				السعر
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="number" name="price" class="form-control course_price" value="{{$course->price}}">
		 			</div> 
		 		</div>
		 		<div class="col-12 px-2 py-2 whatsapp_phone">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				واتس آب
		 			</div>
		 			<div class="col-12 px-0">
		 				<input  name="whatsapp_phone" class="form-control whatsapp_phone" value="{{$course->whatsapp_phone}}" >
		 			</div> 
		 		</div>
		 		
		 		<div class="col-12 px-2 py-2">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				متاح في 
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="datetime-local" name="available_at" class="form-control" value="{{$course->available_at}}" >
		 			</div> 
		 		</div>
		 		<div class="col-12 px-2 py-2 accept_payments_untill">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				الحجز - الشراء متاح حتى
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="datetime-local" name="accept_payments_untill" class="form-control accept_payments_untill" value="{{$course->accept_payments_untill}}" >
		 			</div> 
		 		</div>

		 		

		 		

		 		<div class="col-12 px-2 py-2">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				الصورة المصغرة
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="file" name="image" class="form-control" accept="image/*">
		 			</div> 
		 		</div>

		 		<div class="col-12 px-2 py-2">
		 			<div class=" col-12 px-0 pb-2" style="width: 100px">
		 				البانر
		 			</div>
		 			<div class="col-12 px-0">
		 				<input type="file" name="banner" class="form-control" >
		 			</div> 
		 		</div>
		 		

		 		<div class="col-12 px-2 py-2">
		 			<div class=" col-12 px-0 pb-2" >
		 				الصورة الحالية 
		 				<div class="col-12 px-0 ">
		 					<img src="{{$course->image()}}" style="width: 100%;" class="py-2">
		 				</div>
		 			</div>
		 			<div class=" px-2">
		 				البانر الحالي

		 				<img src="{{$course->banner()}}" style="width: 100%;max-height: 150px" class="py-2">
		 			</div> 
		 		</div> 

	 		</div>
	 		
	 		


	 		<div class="col-12 px-2 py-2">
	 		 
	 			<div class=" px-2">
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