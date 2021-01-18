@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل كورس النجاح</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('courses.update',$course)}}" enctype="multipart/form-data">
	 			@csrf
	 			@method("PUT")
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				عنوان الكورس
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{$course->title}}" min="3" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				وصف الكورس
	 			</div>
	 			<div class="col-9 px-2">
	 				<textarea type="" name="description" class="form-control" min="3" max="1000" style="min-height: 200px">{{$course->description}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				السعر
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="number" name="price" class="form-control" value="{{$course->price}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				متاح في 
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="datetime-local" name="available_at" class="form-control" value="{{$course->available_at}}" >
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الصورة المصغرة
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="image" class="form-control" >
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				البانر
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="banner" class="form-control" >
	 			</div> 
	 		</div>
	 		

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الصورة الحالية 
	 				<div class="col-12 px-0 ">
	 					<img src="{{$course->image()}}" style="width: 100%;" class="py-2">
	 				</div>
	 			</div>
	 			<div class="col-9 px-2">
	 				البانر الحالي

	 				<img src="{{$course->banner()}}" style="width: 100%;max-height: 150px" class="py-2">
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
@endsection