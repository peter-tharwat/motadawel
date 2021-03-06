@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4 " style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 justify-content-between row d-flex">
	 		<div class="col-12 col-lg-4 px-2 mb-2">
	 			<form method="get" action="{{route('orders.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form> 
	 		</div>
	 		{{-- <div class="col-12 col-lg-4 px-2 justify-content-end d-flex mb-2">
	 			<a href="{{route('orders.create')}}">
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
		      <th scope="col">الحالة</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($orders as $order)
		    <tr>
		      <td scope="col">{{$order->id}}</td>
		      <td scope="col"><a href="/admin/users?id={{$order->user->id}}">{{$order->user->name}}</a></td>
		      <td scope="col">
		      	@if($order->type=="COURSE")
		      		<a href="/admin/courses?id={{$order->course->id}}">{{$order->course->title}}</a> 
				@else
				<a href="/subscriptions" target="_blank">
					@if(isset($order->payment))
					باقة ( {{$order->payment->amount}} ) ريال
					@endif
				</a>
				@endif</td>
		      <td scope="col">{{$order->type}}</td>
		      <td scope="col">
		      	@if($order->status=="DONE")
		      	<span class="badge bg-success pb-2">مدفوع</span>
		      	@elseif($order->status=="PENDING")
		      	<span class="badge bg-warning pb-2" style="color: #232323">لم يتم الدفع</span>
		      	@elseif($order->status=="CANCELED")
		      	<span class="badge bg-danger pb-2">ملغية</span>
		      	@else
		      	{{$order->status}}
		      	@endif
		      </td>
		      <td class=" row d-flex">
		      	{{-- <form method="POST" action="{{route('orders.destroy',$order)}}" id="order_delete_{{$order->id}}">@csrf @method('DELETE')</form> --}}
		      	<a href="{{route('orders.edit',$order)}}" style="width: 30px;height: 30px;color: #fff;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1 bg-primary">
		      		<span class="fal fa-edit"></span>
		      	</a> 
		      	<a href="/admin/payments?order_id={{$order->id}}" style="width: 30px;height: 30px;color: #fff;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1 bg-success">
		      		<span class="fal fa-sack"></span>
		      	</a> 
		      	
		     {{--  	<a href="#" style="width: 30px;height: 30px;color: #fff;background: #c00;border-radius: 2px" class="d-flex align-items-center justify-content-center mx-1" onclick='var result = confirm("هل أنت متأكد من عملية الحذف");if (result) {$("#order_delete_{{$order->id}}").submit();}'>
		      		<span class="fal fa-trash"></span>
		      	</a> --}}


		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$orders->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection
