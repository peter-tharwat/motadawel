@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('courses.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
	 		<div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('courses.create')}}">
	 				<button class="btn btn-primary pb-2 rounded-0"><span class="fal fa-box-full"></span> إضافة كورس</button>
	 			</a>
	 		</div>

	 	</div> 
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">العنوان</th>
		      {{-- <th scope="col">الوصف</th> --}}
		      <th scope="col">السعر</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>

		  	@foreach($courses as $course)
		    <tr>
		      <td scope="col">{{$course->id}}</td>
		      <td scope="col">{{$course->title}}</td>
		      {{-- <td scope="col">{{$course->description}}</td> --}}
		      <td scope="col">{{$course->price}}</td>
		      <td class=" row d-flex">
		      	<form method="POST" action="{{route('courses.destroy',$course)}}" id="course_delete_{{$course->id}}">@csrf @method('DELETE')</form>
		      	<a href="{{route('courses.edit',$course)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1">
		      		<span class="fal fa-edit"></span>
		      	</a> 

		      	<a href="{{route('videos.index',['course_id'=>$course->id])}}" style="width: 30px;height: 30px;color: #fff;background: #4caf50;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" title="ميزات للشريك">
		      		<span class="fas fa-play"></span>
		      	</a> 



		      {{-- 	<a href="{{route('courses-features.index',['course_id'=>$course->id])}}" style="width: 30px;height: 30px;color: #fff;background: #4caf50;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" title="ميزات للشريك">
		      		<span class="fas fa-stars"></span>
		      	</a> 
		      	<a href="{{route('courses-links.index',['course_id'=>$course->id])}}" style="width: 30px;height: 30px;color: #fff;background: #ff9800;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" title="ميزات روابط">
		      		<span class="fas fa-link"></span>
		      	</a>  --}}

		      		
		      	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #f44336;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#course_delete_{{$course->id}}").submit();}'>
		      		<span class="fal fa-trash"></span>
		      	</a>
 
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$courses->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection
