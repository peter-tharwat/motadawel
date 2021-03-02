@extends('layouts.app')
@section('content')
{{-- @livewire('search-test')
--}}
<div class="col-12 px-0 py-2" style="background: #f7f7f7">
    <div class="container py-3 ">
        <h2 style="color: #232323" class="font-3">شركاء نجاحنا</h2>
        <h4 style="color: #333" class="mt-3 font-2">دائماً ستجد شركائنا معك حيثما تكون . معك لتقديم الدعم لك و تعزيز عملية التداول الخاصة بك</h4>
    </div>
</div>
<div class="col-12 px-0 py-0">
    <div class="col-12 px-0 py-2 container">
        <div class="col-12 px-0 d-flex row py-5">
          @php 
          $partners=\App\Models\Partner::orderBy('id','DESC')->simplePaginate(9);
          @endphp
            @foreach($partners as $partner) <div class="col-12 col-lg-4">
                <a href="{{route('partner',['id'=>$partner->id,'title'=>str_replace(' ','-',$partner->title)])}}" style="color: #333">
                <div class="col-12 p-2 course my-3 hover-border-yellow" style="border:2px solid transparent;border-radius: 3px;overflow: hidden;background: #fff">
                    <img src="{{$partner->image()}}" style="height: 300px;">
                    <div class="col-12 px-0 py-3">
                        <h4 style="line-height: 1.5;" class="font-2">{{$partner->title}}</h4> 

                        {{-- <h5 style="line-height: 1.5;font-size: 13px;">{{$partner->description}}</h5>

                        <h6 class="font-1 mt-1" style="color: color: #aaa"><span class="fas fa-clock" style="color: color: #aaa"></span> {{\Carbon::parse($partner->created_at)->diffForHumans()}}</h6> --}}
                    </div>
                </div>
                </a>
        </div>
        @endforeach
        <div class="col-12 py-3 d-flex"> 
          {{ $partners->appends(request()->query())->render() }} 
        </div>
    </div>
</div>
</div>
@endsection
