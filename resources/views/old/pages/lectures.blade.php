@extends('layouts.app')
@section('content')
{{-- @livewire('search-test')
--}}
<div class="col-12 px-0 py-2" style="background: #f7f7f7">
    <div class="container py-3 ">
        <h2 style="color: #232323" class="font-3">المحاضرات التعليمية</h2>
        <h4 style="color: #333" class="mt-3 font-2">يمكنك الاستماع إلى المحاضرات التعليمية المجانية الخاصة بأبورسيل الثقفي مباشرة عبر الموقع الالكتروني</h4>
    </div>
</div>
{{-- <div class="col-12 px-0 " style="max-height: 30px;">
    <div style="height: 120px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #f7f7f7;"></path>
        </svg></div>
</div>  --}}
<div class="col-12 px-0 py-0">
    <div class="col-12 px-0 py-2 container" style="min-height: 100vh">
        <div class="col-12 px-0 d-flex row py-5">
          @php 
          $lectures=\App\Models\Lecture::orderBy('id','DESC')->simplePaginate(9);
          @endphp
            @foreach($lectures as $lecture) <div class="col-12 col-lg-4">
                <div class="col-12 p-2 course my-3 hover-border-yellow" style="border:2px solid transparent;border-radius: 3px;overflow: hidden;background: #fff">
                    <iframe style="width: 100%;min-height: 220px" src="https://www.youtube.com/embed/{{$lecture->video_code()}}?controls=1&amp;rel=0&amp;showinfo=0&amp;color=white" allowfullscreen>
                            </iframe>  
                    <div class="col-12 px-0 py-3">
                        <h4 style="line-height: 1.5;" class="font-2">{{$lecture->title}}</h4> 
                        <h5 style="line-height: 1.5;font-size: 13px;">{{$lecture->description}}</h5>
                        <h6 class="font-1 mt-1" style="color: color: #aaa"><span class="fas fa-clock" style="color: color: #aaa"></span> {{\Carbon::parse($lecture->created_at)->diffForHumans()}}</h6>
                    </div>
                </div>
        </div>
        @endforeach
        <div class="col-12 py-3 d-flex"> 
          {{ $lectures->appends(request()->query())->render() }} 
        </div>
    </div>
</div>
</div>
@endsection
