@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3 row m-0">
	 		<div class="col-12 col-lg-6 px-0 py-2">
	 			<h4>تعديل صفحى منصة المحلل الفني</h4>
	 		</div>
	 		<div class="col-12 col-lg-6 d-flex justify-content-end py-2">
	 			<a href="{{route('mohallel-videos.index')}}">
	 				<button class="btn btn-primary">عرض الفيديوهات</button>
	 			</a>
	 		</div>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<div class="col-12 px-0 d-flex justify-content-start pb-4">
	 			
	 		</div>
	 		<form class="col-12" method="POST" action="{{route('mohallel.update',$mohallel)}}" enctype="multipart/form-data">
	 			@csrf 
	 			@method("PUT")

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الصورة الرئيسية
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="image" class="form-control" >
	 				@if($mohallel->image!=null)
			 		<div class="col-12 pb-3">
			 			<img src="{{$mohallel->image()}}" style="width:300px;max-width: 100%;">
			 		</div>
			 		@endif

	 			</div> 
	 		</div>
	 		

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				العنوان
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="text" name="title" class="form-control" value="{{$mohallel->title}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				العنوان الفرعي
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="text" name="sub_title" class="form-control" value="{{$mohallel->sub_title}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الوصف
	 			</div>
	 			<div class="col-9 px-2">
	 				<textarea name="description" class="form-control" style="min-height:200px">{{$mohallel->description}}</textarea>
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الميزات الاساسيية
	 			</div>
	 			<div class="col-9 px-2">
	 				<textarea name="main_features" class="form-control" style="min-height:250px">{{$mohallel->main_features}}</textarea>
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				محتوياتها
	 			</div>
	 			<div class="col-9 px-2">
	 				<textarea name="features" class="form-control" style="min-height:250px">{{$mohallel->features}}</textarea>
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