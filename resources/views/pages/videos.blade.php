@extends('layouts.app')
@section('content')
{{-- @livewire('search-test')
--}}
<style>
  .hover-light:hover{
    background: #f5f5f5!important;
    cursor: pointer;
  }
</style>
<div class="col-12 px-0 py-2" style="background: #f7f7f7">
    <div class="container py-3 ">
        <h2 style="color: #232323" class="font-3">{{$course->title}}</h2>
       {{--  <h4 style="color: #333" class="mt-3 font-2">يوفر لك موقعنا العديد من الدورات التدريبية التي تعزز من مهاراتك</h4> --}}
    </div>
</div>
{{-- <div class="col-12 px-0 " style="max-height: 30px;">
    <div style="height: 120px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #f7f7f7;"></path>
        </svg></div>
</div>  --}}
@php 
if(\Request::get('video_id')!=null){
$video=$course->videos()->where('id',\Request::get('video_id'))->firstOrFail();
}else{
$video=$course->videos()->firstOrFail();
}
@endphp
<div class="col-12 px-0 py-0">
    <div class="col-12 px-0 py-2 container" style="min-height: 100vh">
      <div class="col-12 px-0 row d-flex">
        
      
        <div class="col-12 col-lg-3 px-2">
           <div class="col-12 py-3" style="background: #fff">
             <div class="col-12 pb-3 border-bottom px-3 font-2">  
               الفيديوهات
             </div>
             <div class="col-12 px-0 py-2">
              
               <div class="col-12 px-2 py-2" style="height: 500px;overflow-y: auto;">
                @foreach($videos as $videox)
                <a href="{{route('videos',['id'=>$course->id,'title'=>str_replace(' ','-',$course->title),'video_id'=>$videox->id])}}">
                 <div style="background: #f8f8f8;font-size: 15px" class="px-3 pt-2 pb-3  hover-light ">
                  <div class="col-12 py-1 position-relative" style="color: #232323">
                    <span class="fas fa-play ml-2" 
                    @if(\Request::get('video_id')==$videox->id)
                    style="color: #2381c6;" 
                    @endif
                    ></span> {{$videox->title}}
                    @if($videox->cost_type=="FREE")
                    <span style="position: absolute;left: -14px;top: -7px;font-size: 10px;width: 49px;height: 24px; line-height: 0.3;" class="btn btn-warning rounded-0">مجاني</span>
                    @endif
                  </div> 
                 </div>
                 </a>
                 @endforeach
               </div>
               
             </div>
           </div>
         </div>
         <div class="col-12 col-lg-9 px-2">
           <div class="col-12 py-3 px-3" style="background: #fff">
            <video  style="width: 100%" controls>
              <source src="/videos/video.mp4" type="video/mp4"> 
            </video>
           </div>
           <div class="col-12 py-3 px-3 mt-3" style="background: #fff;">
            <div class="col-12 px-0">
              <div class="col-12 px-0 py-2 border-bottom" >
                <h5>{{$video->title}}</h5>
              </div>
              <div class="col-12 px-0 py-2">
                <h6>{{$video->description}}</h6>
              </div>
            </div>
           </div>
           @include('include.share')

         </div>
      </div>
    </div>
</div>
@endsection
