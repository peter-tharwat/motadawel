@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل المستخدم</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('users.update',$user)}}">
	 			@csrf
	 			@method("PUT")
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الاسم
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="name" class="form-control" value="{{$user->name}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				البريد الإلكتروني
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="" name="email" class="form-control" value="{{$user->email}}">
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				محظور
	 			</div>
	 			<div class="col-9 px-2  form-switch">
	 				<input type="checkbox" name="blocked" style="width: 25px;height: 25px" class="mt-1 form-check-input" {{$user->blocked=="1"?"checked":''}} value="1" >

	 			</div>  
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الرتبة
	 			</div>
	 			<div class="col-9 px-2  form-switch">
	 				<select name="power" class="form-control">
	 					<option @if($user->power=="USER") selected="" @endif value="USER">مستخدم عادي</option>
	 					<option @if($user->power=="ADMIN") selected="" @endif value="ADMIN">أدمن</option>
	 				</select>
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