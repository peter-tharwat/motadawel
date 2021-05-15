@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('payments.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
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
