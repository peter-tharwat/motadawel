@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>إضافة ميزة لشريك نجاح</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('partners-features.store')}}" enctype="multipart/form-data">
	 			@csrf 
	 		

	 		<input type="hidden" name="partner_id" value="{{$partner->id}}">

	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الشريك
	 			</div>
	 			<div class="col-9 px-2 pt-1">
	 				{{$partner->title}}
	 			</div> 
	 		</div>


	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				اسم الميزة
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="title" class="form-control" value="{{old('title')}}" required="" min="3" max="255">
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