@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('articles.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
	 		<div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('articles.create')}}">
	 				<button class="btn btn-primary pb-2 rounded-0"><span class="fas fa-book"></span> إضافة مقال - خبر </button>
	 			</a>
	 		</div>

	 	</div> 
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">المقال</th>
		      <th scope="col">النوع</th> 
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>
	

		  	@foreach($articles as $article)
		    <tr>
		      <td scope="col">{{$article->id}}</td>
		      <td scope="row">
		      	<span class="d-inline-block">
		      	<img src="{{$article->image()}}" style="width: 35px;max-width: 100%;max-height:35px" >
		      </span>
		      	<span class="d-inline-block">{{$article->title}}</span>
		      	</td>
		      <td scope="col">{{$article->type}}</td>
		      <td class=" row d-flex">
		      	<form method="POST" action="{{route('articles.destroy',$article)}}" id="article_delete_{{$article->id}}">@csrf @method('DELETE')</form>
		      	<a href="{{route('articles.edit',$article)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1">
		      		<span class="fal fa-edit"></span>
		      	</a> 
		      	
		      	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #c00;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#article_delete_{{$article->id}}").submit();}'>
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
