@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل شريك النجاح</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('partners.update',$partner)}}" enctype="multipart/form-data">
	 			@csrf
	 			@method("PUT")
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				عنوان الشريك
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{$partner->title}}" min="3" max="255">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				وصف الشريك
	 			</div>
	 			<div class="col-9 px-2">
	 				<textarea type="" name="description" class="form-control" min="3" max="1000" style="min-height: 200px">{{$partner->description}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				رابط الشريك
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="url" class="form-control" value="{{$partner->url}}">
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
	 					<img src="{{$partner->image()}}" style="width: 100%;" class="py-2">
	 				</div>
	 			</div>
	 			<div class="col-9 px-2">
	 				البانر الحالي

	 				<img src="{{$partner->banner()}}" style="width: 100%;max-height: 150px" class="py-2">
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