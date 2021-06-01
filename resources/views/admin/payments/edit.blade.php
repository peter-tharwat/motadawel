@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل عملية دفع</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('payments.update',$payment)}}">
	 			@csrf
	 			@method("PUT")


	 		<div class="col-12 col-md-6 px-0 mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				الكود 
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				{{$payment->id}}
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				النوع
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				{{$payment->type}}
	 				@if($payment->type=="MOHALLEL" && $payment->amount==0 )
					<span class="bg-secondary badge">الباقة المجانية</span>
					@endif
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				المستخدم
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				<a href="/admin/users?id={{$payment->user->id}}">{{$payment->user->name}}</a>
	 			</div> 
	 		</div> 
	 		
	 		<div class="col-12 col-md-6 px-0  mb-3">
	 			<div class="col-12 px-2  pt-1 font-3">
	 				الطلب
	 			</div>
	 			<div class="col-12 px-2 font-3">
	 				@if($payment->type=="COURSE" && $payment->course!=null)
	 					<a href="/admin/courses?id={{$payment->course->id}}">{{$payment->course->title}}</a> 
					@elseif($payment->type=="MOHALLEL")
						<a href="/subscriptions" target="_blank">
							باقة ( {{$payment->amount}} ) ريال
						</a>
						<div class="pb-3 pt-2 bpayment my-2 px-3 font-2" style="background: #fffbd9">
							 
							اسم المستخدم : {{$payment->order->mohallel_user_name}}
							<br>
							البريد الالكتروني : {{$payment->order->mohallel_email}}
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
	 					<option value="DONE" @if($payment->status=="DONE") selected="" @endif>مكتملة</option>
	 					<option value="PENDING" @if($payment->status=="PENDING") selected="" @endif>معلقة</option>
	 					<option value="CANCELED" @if($payment->status=="CANCELED") selected="" @endif>ملغية</option>
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