@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل تقييم</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('reviews.update',$review)}}">
	 			@csrf
	 			@method("PUT")
	 		


	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				تعليق على التقييم
	 			</div>
	 			<div class="col-9 px-2">
	 				<textarea type="" name="description" class="form-control" min="3" max="1000" style="min-height: 200px">{{$review->description}}</textarea>
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				التقييم
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="number" name="rate" class="form-control" value="{{$review->rate}}" min="0" max="5">
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				تم مراجعته
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="checkbox" style="width: 25px;height: 25px" name="reviewed" {{$review->reviewed==1?'checked':''}} value="1"> 
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				مميز
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="checkbox" style="width: 25px;height: 25px" name="featured" {{$review->featured==1?'checked':''}} value="1"> 
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