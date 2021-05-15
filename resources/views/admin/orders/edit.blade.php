@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل طلب</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('orders.update',$order)}}">
	 			@csrf
	 			@method("PUT")


	 		<div class="col-12 col-md-6 px-0 mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				الكود 
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				{{$order->id}}
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				النوع
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				{{$order->type}}
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				المستخدم
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				<a href="/admin/users?id={{$order->user->id}}">{{$order->user->name}}</a>
	 			</div> 
	 		</div> 
	 		
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				الطلب
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				@if($order->type=="COURSE")
	 					<a href="/admin/courses?id={{$order->course->id}}">{{$order->course->title}}</a> 
					@else
						<a href="/subscriptions" target="_blank">
							باقة ( {{$order->payment->amount}} ) ريال
						</a>
						<div class="pb-3 pt-2 border my-2 px-3 font-2" style="background: #fffbd9">
							 
							اسم المستخدم : {{$order->mohallel_user_name}}
							<br>
							البريد الالكتروني : {{$order->mohallel_email}}
						</div>
							
						
					@endif
	 			</div> 
	 		</div> 

	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				حالة العملية
	 			</div>
	 			<div class="col-12 px-2 font-3 pt-2">
	 				<select name="status" class="form-control">
	 					<option value="DONE" @if($order->status=="DONE") selected="" @endif>مكتملة</option>
	 					<option value="PENDING" @if($order->status=="PENDING") selected="" @endif>معلقة</option>
	 					<option value="CANCELED" @if($order->status=="CANCELED") selected="" @endif>ملغية</option>
	 				</select> 
	 			</div> 
	 		</div>  
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 		 
	 			<div class="col-12 px-2">
	 				<button class="btn pb-2 px-4" style="background: #ffa725;border-radius: 0px;color: #fff ">إعتماد</button>
	 			</div> 

	 		</div>

	 		</form>

	 	</div>
	  
	 </div> 
</div>
@endsection