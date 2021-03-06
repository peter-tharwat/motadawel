@extends('layouts.admin')
@section('content')
<div class="col-12 py-2 px-3 row">
	 <div class="col-12 px-2 pt-4" style="background: #fff;min-height: 80vh">
	 	<div class="col-12 py-4 d-flex justify-content-between">
	 		<div class="col-4 px-2">
	 			<form method="get" action="{{route('users.index')}}">
	 				<input type="" name="key" class="form-control" style="border-radius: 0px;border:1px solid #ddd" placeholder="بحث .. " autofocus="" value="{{request()->get('key')}}">
	 			</form>
	 			
	 		</div>
	 		<div class="col-4 text-start">
	 			<a href="{{route('export.users')}}" class="btn btn-primary"> تصدير المستخدمين Excel</a>
	 		</div>
	 	</div>
	 	<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">الاسم</th>
		      <th scope="col">البريد</th>
		      <th scope="col">الطلبات</th>
		      <th scope="col">تحكم</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($users as $user)
		    <tr>
		      <td scope="col">{{$user->id}}</td>
		      <td scope="col">{{$user->name}}</td>
		      <td scope="col">{{$user->email}}</td>
		      <td scope="col"><a href="/admin/orders?user_id={{$user->id}}">{{$user->orders->count()}}</a></td>
		      <td scope="col">
		      	<a href="{{route('users.edit',$user)}}" style="width: 30px;height: 30px;color: #fff;background: #2381c6;border-radius: 2px" class="d-flex align-items-center justify-content-center">
		      		<span class="fal fa-edit"></span>
		      	</a>
		      	
		      </td>
		    </tr>
		    @endforeach
		  </tbody>
		</table> 
		<div class="col-12 px-0 py-2">
			{{$users->appends(request()->query())->render() }}
		</div>
	 </div> 
</div>
@endsection