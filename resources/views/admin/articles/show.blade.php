@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 col-lg-4 px-3">
	 		<h4><span class="{{$category->icon}} ml-2"></span> {{$category->name}} <a href="{{route('categories.edit',$category)}}"><span class="fal fa-edit"></span></a></h4> 
	 	</div> 
	 	<div class="col-12 col-lg-6 px-3 py-2">
	 		<p style="color: #999;line-height: 1.9">{{$category->description}}</p>
	 	</div>
	 	<div class="col-12 px-3 py-0 col-lg-7">{!!$category->content!!}</div>
	 </div> 
</div>
@endsection