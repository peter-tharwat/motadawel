@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل رابط شريك</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('partners-links.update',$partners_link)}}" enctype="multipart/form-data">
	 			@csrf
	 			@method("PUT") 

	 		 

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				العنوان
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{$partners_link->title}}" required="" min="3" max="255">
	 			</div> 
	 		</div>

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				نوع الايقونة
	 			</div>
	 			<div class="col-9 px-2"> 
	 				<select name="type" class="form-control" required="">
	 					<option hidden="" selected="" disabled="">إختر من القائمة</option>
	 					<option @if($partners_link->type=="file-pdf") selected="" @endif value="file-pdf">PDF</option>
	 					<option @if($partners_link->type=="file") selected="" @endif value="file">ملف</option>
	 					<option @if($partners_link->type=="link") selected="" @endif value="link">رابط</option>
	 					<option @if($partners_link->type=="play") selected="" @endif value="play">فيديو</option>
	 					
	 				</select> 
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الرابط
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="url" class="form-control" value="{{$partners_link->url}}" required="" min="3" max="255">
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