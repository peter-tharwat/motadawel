@extends('layouts.admin')
@section('content')
<div class="col-12 py-0 px-3 row">
	 <div class="col-12  pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 px-3">
	 		<h4>تعديل مدفوعة</h4>
	 	</div>
	 	<div class="col-12 col-lg-9 px-3 py-5">
	 		<form class="col-12" method="POST" action="{{route('payments.update',$payment)}}">
	 			@csrf
	 			@method("PUT")


			<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				المستخدم
	 			</div>
	 			<div class="col-9 px-2 pt-1">
	 				{{$payment->user->name}}
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الطلب
	 			</div>
	 			<div class="col-9 px-2 pt-1">
	 				{{$payment->order->course->title}}
	 			</div> 
	 		</div>
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				مصدر
	 			</div>
	 			<div class="col-9 px-2 pt-1">
	 				{{$payment->source}}
	 			</div> 
	 		</div> 
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				الحالة
	 			</div>
	 			<div class="col-9 px-2 ">
	 				<select class="form-control" required="" name="status">
	 					<option value="PENDING">معلق</option>
	 					<option value="DONE">مكتمل</option>
	 					<option value="CANCELED">ملغي</option>
	 				</select>
	 			</div> 
	 		</div>  
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				النوع
	 			</div>
	 			<div class="col-9 px-2 ">
	 				<select class="form-control" required="" name="type">
	 					<option value="COURSE">كورس</option> 
	 					<option value="MOHALLEL">منصة المحلل الفني</option> 
	 				</select>
	 			</div> 
	 		</div>  
	 		
	 		<div class="col-12 col-md-6 px-0 d-flex mb-3">
	 			<div class="col-3 px-2 text-start pt-1">
	 				المبلغ
	 			</div>
	 			<div class="col-9 px-2">
	 				<input type="number" name="amount" class="form-control" value="{{$payment->amount}}" min="3" max="255">
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