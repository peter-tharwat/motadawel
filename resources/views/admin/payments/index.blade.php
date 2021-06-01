@extends('layouts.admin')
@section('content')
<form method="post" action="{{route('payments.export').str_replace('/admin/payments', '', \Request::getRequestUri()) }}" id="export-form">@csrf</form>
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<form method="get" action="{{route('payments.index')}}" class="row">
	 			<div class="col-12 row px-0 pb-2">
		 			<div class="col-12 col-lg-4">
		 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
		 			</div>
		 			<div class="col-12 col-lg-4 row">
		 				<div style="max-width: 50px" class="col">
		 					من
		 				</div>
		 				<div class="col px-0">
		 					<input type="date" name="date_from" class="form-control" value="{{request()->get('date_from')}}">
		 				</div>
		 				
		 			</div>
		 			<div class="col-12 col-lg-4 row">
		 				<div style="max-width: 50px" class="col">
		 					إلى
		 				</div>
		 				<div class="col px-0">
		 					<input type="date" name="date_to" class="form-control" value="{{request()->get('date_to')}}">
		 				</div>
		 			</div>
	 			</div>
	 			<div class="col-12 row px-0 pb-2">
		 			<div class="col-12 col-lg-4 row ">
		 				<div style="max-width: 50px" class="col">
		 					النوع
		 				</div>
		 				<div class="col px-0 ">
		 					<select name="type" class="form-control">
		 						<option value="ALL" @if(request()->get('type')=="ALL") selected="" @endif>الكل</option>
		 						<option value="COURSE" @if(request()->get('type')=="COURSE") selected="" @endif>الكورسات</option>
		 						<option value="MOHALLEL" @if(request()->get('type')=="MOHALLEL") selected="" @endif>المحلل الفني</option>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-12 col-lg-4 row">
		 				<div style="max-width: 50px" class="col">
		 					الحالة
		 				</div>
		 				<div class="col px-0 ">
		 					<select name="status" class="form-control">
		 						<option value="ALL" @if(request()->get('status')=="ALL") selected="" @endif>الكل</option>
		 						<option value="DONE" @if(request()->get('status')=="DONE") selected="" @endif>مكتمل</option>
		 						<option value="PENDING" @if(request()->get('status')=="PENDING") selected="" @endif>معلق</option>
		 					</select>
		 				</div>
		 			</div>
		 			<div class="col-12 col-lg-4 row">
		 				<div style="max-width: 50px;font-size: 11px!important" class="col">
		 					كود
		 					<br>
		 					مستخدم
		 				</div>
		 				<div class="col px-0">
		 					<input type="number" name="user_id" class="form-control" value="{{request()->get('user_id')}}">
		 				</div>
		 			</div>
	 			</div>
	 			<div class="col-12 row px-0 pb-2">
		 			<div class="col-12 col-lg-4 row ">
		 				<div style="max-width: 50px;font-size: 11px!important" class="col">
		 					السعر
		 					<br>
		 					من
		 				</div>
		 				<div class="col px-0">
		 					<input type="number" name="price_from" class="form-control" value="{{request()->get('price_from')}}">
		 				</div>
		 			</div>
		 			<div class="col-12 col-lg-4 row">
		 				<div style="max-width: 50px;font-size: 11px!important" class="col">
		 					السعر
		 					<br>
		 					إلى
		 				</div>
		 				<div class="col px-0">
		 					<input type="number" name="price_to" class="form-control" value="{{request()->get('price_to')}}">
		 				</div>
		 			</div>
		 			<div class="col-12 col-lg-4 text-start">

		 				<span class="btn btn-primary mr-2" style="cursor: pointer;" onclick="$('#export-form').submit();"> <span class="fal fa-table"></span> تصدير Excel</span>
		 				<button class="btn btn-success mr-2"><span class="fal fa-search"></span> بحث</button>
		 			</div>
	 			</div>

	 		</form>

	 		{{-- <div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('payments.create')}}">
	 				<button class="btn btn-primary pb-2 rounded-0"><span class="fab fa-youtube"></span> إضافة دورة</button>
	 			</a>
	 		</div> --}}

	 	</div> 
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">المستخدم</th>
		      <th scope="col">الكورس</th>
		      <th scope="col">النوع</th>
		      <th scope="col">المبلغ</th>
		      <th scope="col">الحالة</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($payments as $payment)
		    <tr>
		      <td scope="col">{{$payment->id}}</td>
		      <td scope="col"><a href="/admin/users?id={{$payment->user->id}}">{{$payment->user->name}}</a></td>
		      <td scope="col">
		      	@if($payment->type=="COURSE")
		      		<a href="/admin/courses?id={{$payment->order->course->id}}">{{$payment->order->course->title}}</a> 
				@else
				<a href="/subscriptions" target="_blank">
					باقة ( {{$payment->amount}} ) ريال
				</a>
				@endif
				@if($payment->type=="MOHALLEL" && $payment->amount==0 )
				<span class="bg-secondary badge">الباقة المجانية</span>
				@endif
			</td>
		      <td scope="col">{{$payment->type}}</td>
		      <td scope="col">{{$payment->amount}} ريال</td>
		      <td scope="col">
		      	@if($payment->status=="DONE")
		      	<span class="badge bg-success pb-2">مدفوع</span>
		      	@elseif($payment->status=="PENDING")
		      	<span class="badge bg-warning pb-2" style="color: #232323">لم يتم الدفع</span>
		      	@elseif($payment->status=="CANCELED")
		      	<span class="badge bg-danger pb-2">ملغية</span>
		      	@else
		      	{{$payment->status}}
		      	@endif
		      </td>
		      <td class=" row d-flex">
		      	{{-- <form method="POST" action="{{route('payments.destroy',$payment)}}" id="payment_delete_{{$payment->id}}">@csrf @method('DELETE')</form> --}}
		      	<a href="{{route('payments.edit',$payment)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1">
		      		<span class="fal fa-edit"></span>
		      	</a> 
		      	<a href="/admin/orders?id={{$payment->order_id}}" style="width: 30px;height: 30px;color: #fff;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1 bg-info">
		      		<span class="fal fa-box-check "></span>
		      	</a> 
		      	
		      	
		     {{--  	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #c00;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#order_delete_{{$payment->id}}").submit();}'>
		      		<span class="fal fa-trash"></span>
		      	</a> --}}


		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$payments->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection
