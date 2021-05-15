@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>عرض الرسالة رقم {{$contact->id}} القادمة من {{$contact->name}}</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<div class="col-12 col-md-6 px-0 mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				اسم المرسل
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				{{$contact->name}}
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				رقم الهاتف
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				{{$contact->phone}}
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0  mb-3 border pt-2 pb-3 px-3" style="background: #fffce3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				الرسالة
	 			</div>
	 			<div class="col-12 px-2  font-3 " style="font-weight: bold">
	 				{{$contact->message}}
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				تاريخ إستقبال الرسالة
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				{{$contact->created_at}} - {{\Carbon::parse($contact->created_at)->diffForHumans()}}
	 			</div> 
	 		</div>


	 	</div>
	  
	 </div> 
</div>
@endsection