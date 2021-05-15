@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('partners.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
	 		<div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('partners.create')}}">
	 				<button class="btn btn-primary pb-2 rounded-0"><span class="fas fa-hands-helping"></span> إضافة شريك</button>
	 			</a>
	 		</div>

	 	</div> 
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">الصورة</th>
		      <th scope="col">العنوان</th>
		      {{-- <th scope="col">الوصف</th> --}}
		      <th scope="col">الرابط</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>

		  	@foreach($partners as $partner)
		    <tr>
		      <td scope="col">{{$partner->id}}</td>
		      <td scope="col">
		      	<img src="{{$partner->image()}}" style="width: 60px;" class="py-2">
		      </td>
		      <td scope="col">
		      	

		      	{{$partner->title}}</td>
		      {{-- <td scope="col">{{$partner->description}}</td> --}}
		      <td scope="col">
		      	<a href="{{$partner->url}}" target="_blank">{{$partner->url}}</a></td>
		      <td class=" row d-flex">
		      	<form method="POST" action="{{route('partners.destroy',$partner)}}" id="partner_delete_{{$partner->id}}">@csrf @method('DELETE')</form>
		      	<a href="{{route('partners.edit',$partner)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1">
		      		<span class="fal fa-edit"></span>
		      	</a> 
		      	<a href="{{route('partners-features.index',['partner_id'=>$partner->id])}}" style="width: 30px;height: 30px;color: #fff;background: #4caf50;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" title="ميزات للشريك">
		      		<span class="fas fa-stars"></span>
		      	</a> 
		      	<a href="{{route('partners-links.index',['partner_id'=>$partner->id])}}" style="width: 30px;height: 30px;color: #fff;background: #ff9800;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" title="روابط الشريك">
		      		<span class="fas fa-link"></span>
		      	</a> 

		      		
		      	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #f44336;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#partner_delete_{{$partner->id}}").submit();}'>
		      		<span class="fal fa-trash"></span>
		      	</a>
 
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$partners->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection
