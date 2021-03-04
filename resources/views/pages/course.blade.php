@extends('layouts.app')
@section('content')
 
{{-- <div class="col-12 px-0 py-5" style="background: #22359e">
  <div class="container py-5 mt-3">
    <h2 style="color: #fff">إسم الكورس </h2>
    <h4 style="color: #fff" class="mt-3">وصف الكورس ، هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</h4>
  </div>
</div> --}}
{{-- <div class="col-12 px-0 " style="max-height: 30px;">
<div style="height: 120px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #f7f7f7;"></path></svg></div>
</div> --}}
<div class="col-12 px-0 py-2" style="background: #f7f7f7">
    <div class="container py-3 ">
      <div class="col-12 px-0 row d-flex ">
        <div class="col-12 col-lg-8 mt-2 mt-lg-0">
          <h2 style="color: #232323" class="font-lg-4 font-2">{{$course->title}}</h2>
        </div>
        <div class="col-12 col-lg-4 justify-content-end d-flex mt-2 mt-lg-0">
          @if($course->available_at>date('Y-m-d h:i:s'))
          <span class="font-2 mt-2" >
          <span class="fas fa-info-circle" style="color: #ff9800"></span> ستكون الفيديوهات متاحة بعد  {{\Carbon::parse($course->available_at)->diffForHumans()}}
          </span>
          @else
            @if($course->videos->count()>0)
            <a href="{{route('videos',['id'=>$course->id,'title'=>str_replace(' ','-',$course->title)])}}">
            <span class="btn btn-primary rounded-0">
              <span class="fas fa-play" style="color: #fff"></span> عرض الفيديوهات
            </span> 
          </a>
            @endif
          @endif
        </div>
      </div>
        
      {{--   <h4 style="color: #333" class="mt-3 font-2"></h4> --}}
    </div>
</div>

<div class="col-12 px-0 py-3" style="min-height: 100vh">
  

<div class="col-12 px-0 py-0 container" >
  
<div class="col-12 px-0 d-flex row py-0">
      
    <div class="col-12 px-0 row d-flex">
      <div class="col-12 col-lg-9 mt-2">

       <div class="col-12 px-3"  style="background: #fff">
         
       
        <div class="col-12 py-3 px-0">
          <img src="{{$course->banner()}}" style="width: 100%;border-radius: 0px"> 
        </div>

        <div class="col-12 pb-3">
          <p style="line-height: 1.9;white-space: pre-line;" class=" col-12">{!!$course->description!!}</p>
        </div> 
        </div>


        @include('include.share')
       



        <div style="background: #fff" class="mt-3 d-flex row px-3 justify-content-start py-3">
          <div class="col-12 font-2 pb-3 border-bottom mb-3">
            دورات آخرى
          </div>
          @php 
          $courses=\App\Models\Course::where('id','<>',$course->id)->inRandomOrder()->limit(4)->get();
          @endphp
          @foreach($courses as $coursex)
          <div class="col-12 col-lg-3 px-2">
            <a href="{{route('course',['id'=>$coursex->id,'title'=>str_replace(' ','-',$coursex->title)])}}" style="color: #333">
                <div class="col-12 p-2 course my-3" style="border:2px solid #fff;border-radius: 3px;overflow: hidden;background: #fff">
                    <img src="{{$coursex->image()}}" style="
              border-radius: inherit!important;
              width: 100%;
              height: 200px;
              object-fit: cover;
              font-family: 'object-fit: cover; object-position: bottom;';
              vertical-align: middle;
              border-radius: 0!important;
              ">
                    <div class="col-12 px-0 py-3">
                        <h4 style="line-height: 1.5;" class="font-2">{{$coursex->title}}</h4>
                        
                    </div>
                </div>
                </a>
        </div>
        
        @endforeach

        </div>
        
      </div>
      <div class="col-12 col-lg-3 mt-2" style="">
        
        <div class="col-12 p-3 " style="border-radius: 3px;overflow: hidden;background: #fff">
          <img src="{{$course->image()}}" style="
              border-radius: inherit!important;
              width: 100%;
              height: 200px;
              object-fit: cover;
              font-family: 'object-fit: cover; object-position: bottom;';
              vertical-align: middle;
              border-radius: 0!important;
              ">
          <div class="col-12 px-0 pt-3">
            <h5 style="color: #4caf50" class="pt-1 pb-2"><span class="fas fa-sack" style="color: #4caf50" ></span> سعر الدورة {{$course->price}} ريال</h5>
            {{-- <h4 style="line-height: 1.5;" class="text-center">احجز الدورة الآن</h4> --}}
            <div class="col-12 px-0 ">
              <div class="col-12 px-0 pt-2 pb-3 btn btn-success text-center font-2"  style="border-radius: 0px ; background: #4caf50;border-color: #4caf50;color: #fff">
                إحجز الآن
              </div>
            </div>
          </div>
        </div>
 
      </div>

    </div>
   
    {{--   @for($i=0;$i<8;$i++)
      <div class="col-12 col-lg-3"  >
        
      </div>
      @endfor
 --}}
    
      </div>






    </div>

</div>

@endsection