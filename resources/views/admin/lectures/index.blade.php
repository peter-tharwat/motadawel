@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('lectures.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
	 		<div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('lectures.create')}}">
	 				<button class="btn btn-primary pb-2 rounded-0"><span class="fab fa-youtube"></span> إضافة دورة</button>
	 			</a>
	 		</div>

	 	</div> 
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">العنوان</th>
		      <th scope="col">الوصف</th>
		      <th scope="col">الرابط</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($lectures as $lecture)
		    <tr>
		      <td scope="col">{{$lecture->id}}</td>
		      <td scope="col">{{$lecture->title}}</td>
		      <td scope="col">{{$lecture->description}}</td>
		      <td scope="col">{{$lecture->url}}</td>
		      <td class=" row d-flex">
		      	<form method="POST" action="{{route('lectures.destroy',$lecture)}}" id="lecture_delete_{{$lecture->id}}">@csrf @method('DELETE')</form>
		      	<a href="{{route('lectures.edit',$lecture)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1">
		      		<span class="fal fa-edit"></span>
		      	</a> 
		      	
		      	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #c00;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#lecture_delete_{{$lecture->id}}").submit();}'>
		      		<span class="fal fa-trash"></span>
		      	</a>


		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
	 </div> 
</div>
@endsection
