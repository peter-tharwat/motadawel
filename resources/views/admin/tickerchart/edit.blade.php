@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3 row m-0">
	 		<div class="col-12 col-lg-6 px-0 py-2">
	 			<h4>تعديل تكر شارت</h4>
	 		</div>
	 		<div class="col-12 col-lg-6 d-flex justify-content-end py-2">
	 			<a href="{{route('tickerchart-videos.index')}}">
	 				<button class="btn btn-primary">عرض الفيديوهات</button>
	 			</a>
	 		</div>
	 	</div>

	 	



	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<div class="col-12 px-0 d-flex justify-content-start pb-4">
	 			
	 		</div>
	 		<form class="col-12" method="POST" action="{{route('tickerchart.update',$tickerchart)}}" enctype="multipart/form-data">
	 			@csrf 
	 			@method("PUT")

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				اللوجو 
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="logo" class="form-control" >
	 				@if($tickerchart->logo!=null)
			 		<div class="col-12  py-2">
			 			<img src="{{$tickerchart->logo()}}" style="width:300px;max-width: 100%;">
			 		</div>
			 		@endif

	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الصورة الرئيسية
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="file" name="image" class="form-control" >
	 				@if($tickerchart->image!=null)
			 		<div class="col-12 py-2">
			 			<img src="{{$tickerchart->image()}}" style="width:300px;max-width: 100%;">
			 		</div>
			 		@endif

	 			</div> 
	 		</div>
	 		

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				العنوان
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="text" name="title" class="form-control" value="{{$tickerchart->title}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				عنوان إفتح حساب
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="text" name="open_account_title" class="form-control" value="{{$tickerchart->open_account_title}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				رابط إفتح حساب
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="url" name="open_account_link" class="form-control" value="{{$tickerchart->open_account_link}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				رابط التيليجرام 
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="url" name="telegram_link" class="form-control" value="{{$tickerchart->telegram_link}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				رابط الدليل المصور
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="url" name="visual_guide_link" class="form-control" value="{{$tickerchart->visual_guide_link}}">
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