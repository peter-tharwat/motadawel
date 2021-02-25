@extends('layouts.app')
@section('content')
{{-- @livewire('search-test')
--}}
 
{{-- <div class="col-12 px-0 " style="max-height: 30px;">
    <div style="height: 120px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #f7f7f7;"></path>
        </svg></div>
</div>  --}}

<div class="col-12 px-0 ">
  <div class="col-12 px-0 py-2 container">
    <div class="col-12 px-0 d-flex row py-5" style="min-height: 100vh">
           <div class="col-12 mx-auto  col-lg-7 p-2" style="background: #fff;">
              <h2 style="color: #232323;font-weight: bold" class="font-3 font-lg-4 p-2 px-3 text-center">{{$article->title}}</h2>
              <h6 style="color: #999;" class="font-1 text-center mb-3"> آخر تحديث <span class="fas fa-clock mx-2"></span> {{\Carbon::parse($article->created_at)->diffForHumans()}} </h6>
              <div class="col-12 px-0">
                <img src="{{$article->image()}}" class="px-2" style="width: 100%;">
              </div>
              <div class="col-12 px-3">
                {!!$article->description!!}
              </div>
           </div>
    </div>
  </div>
</div>
@endsection
