@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>إضافة قسم</h4>
	 	</div>

	 	<div class="col-12  px-3 py-5 row d-flex">
	 		<form class="col-12 row" method="POST" action="{{route('articles.update',$article)}}" enctype="multipart/form-data">
	 			@csrf 
	 			@method("PUT")
	 		<div class="col-12 col-lg-9 px-0">
	 			<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 			 	عنوان المقال
		 			</div>
		 			<div class="col-12 px-2">
		 				<input type="" name="title" class="form-control" value="{{$article->title}}" required="" min="3" max="255">
		 			</div> 
		 		</div>

		 		<div class="col-12  px-0  mb-3">
		 			<div class="col-12 px-2 pb-3 pt-1" >
		 				المحتوى
		 			</div>
		 			<div class="col-12 px-2" >
		 				<textarea class="form-control" name="description"  id="editor"  style="min-height: 600px;direction: rtl;">{{$article->description}}</textarea> 
		 			</div> 
		 		</div>

		 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
		 			 
		 			<div class="col-12 px-2">
		 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">إعتماد</button>
		 			</div> 

		 		</div>

	 		</div>
	 		<div class="col-12 col-lg-3 px-0">


	 		

	 		<div class="col-12  px-0  mb-3">
	 			<div class="col-12 px-2 pb-3 pt-1" >
	 				الصورة المصغرة
	 			</div>
	 			<div class="col-12 px-2">
	 				<input type="file" name="image" class="form-control" accept="images/*">
	 				<img src="{{$article->image()}}" style="width: 200px;max-width: 100%;" class="mt-2">
	 			</div> 
	 		</div>
	 	 

	 		<div class="col-12 px-0 mb-3">
	 			<div class="col-12 px-2 pb-3 pt-1" >
	 				نوع المقال
	 			</div>
	 			<div class="col-12 px-2">
	 				<select name="type" class="form-control" required=""> 
	 					
	 						<option value="NEWS" @if($article->type=="NEWS") selected="" @endif>خبر</option> 
	 						<option value="ARTICLE" @if($article->type=="ARTICLE") selected="" @endif>مقال</option> 
	 				</select> 
	 			</div> 
	 		</div>

 
	 	 
	 		

	 	</div>

	 		</form>

	 	</div>


	  
	  
	 </div> 
</div>
@endsection