@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('reviews.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
	 		{{-- <div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('reviews.create')}}">
	 				<button class="btn btn-primary pb-2 rounded-0"><span class="fas fa-stars"></span> إضافة تقييم</button>
	 			</a>
	 		</div> --}}

	 	</div> 
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">المستخدم</th>
		      <th scope="col">الكورس</th>
		      <th scope="col">التقييم</th>
		      <th scope="col">تعليق</th>
		      <th scope="col">تم مراجعته</th>
		      <th scope="col">مميز</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($reviews as $review)
		    <tr>
		      <td scope="col">{{$review->id}}</td>
		      <td scope="col">{{$review->user->name}}</td>
		      <td scope="col">{{$review->course->title}}</td>
		      <td scope="col">
		      	<span class="d-inline-block" style="width: 60px;height: 6px;background: #ddd ;border-radius: 20px!important;overflow: hidden;">
		      		<span class="d-block" style="height: 6px;background: green;width:{{$review->rate*20}}%"></span>
		      	</span>
		      	</td>
		      <td scope="col">{{$review->description}}</td>
		      <td scope="col">
		      	@if($review->reviewed==1)
		      	<span class="fas fa-check font-2" style="color: green"></span>
		      	@endif
		      </td>
		      <td scope="col">
		      	@if($review->featured==1)
		      	<span class="fas fa-check font-2" style="color: green"></span>
		      	@endif
		      </td>

		      <td class=" row d-flex">
		      	<form method="POST" action="{{route('reviews.destroy',$review)}}" id="review_delete_{{$review->id}}">@csrf @method('DELETE')</form>
		      	<a href="{{route('reviews.edit',$review)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1">
		      		<span class="fal fa-edit"></span>
		      	</a> 
		      	
		      	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #c00;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#review_delete_{{$review->id}}").submit();}'>
		      		<span class="fal fa-trash"></span>
		      	</a>
 

		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$reviews->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection
