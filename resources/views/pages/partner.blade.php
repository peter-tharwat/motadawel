@extends('layouts.app')
@section('content')
 
{{-- <div class="col-12 px-0 py-5" style="background: #22359e">
  <div class="container py-5 mt-3">
    <h2 style="color: #fff">إسم الكورس </h2>
    <h4 style="color: #fff" class="mt-3">وصف الكورس ، هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</h4>
  </div>
</div> --}}


{{-- <div class="col-12 px-0 " style="max-height: 30px;">
<div style="height: 120px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #2b5bbb;"></path></svg></div>
</div>
 --}}
<div class="col-12 px-0 py-0 mb-5"  >
  

<div class="col-12 px-0 py-0 container mb-5" >
  
<div class="col-12 px-0 d-flex row py-5 mb-5">
      
    <div class="col-12 px-3 py-4 row d-flex mx-auto" style="background: #fff;max-width: 1000px">
      <div class="col-12">

        <h2 class="mb-3 text-center">{{$partner->title}}</h2>

        <div class="col-12 py-3 px-0">
          <img src="{{$partner->banner()}}" style="width: 100%;border-radius: 5px;"> 
        </div>

        
        {{-- <h4 style="line-height: 1.9">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق. </h4> --}}
        
        <div class="col-12 px-0 py-3 row d-flex" >

          <div class="col-12 col-lg-7 px-0 my-lg-0 my-lg-0 ">
              
              <p style="line-height: 1.9;white-space: pre-line;">{!!$partner->description!!}</p>

             

            </div>
            <div class="col-12 col-lg-5 px-0 ">
             {{--  <div class="plyr__video-embed" id="player">
                <iframe
                  src="https://www.youtube.com/embed/bTqVqk7FSmY?origin=https://plyr.io&amp;iv_load_policy=3&amp;modestbranding=1&amp;playsinline=1&amp;showinfo=0&amp;rel=0&amp;enablejsapi=1"
                  allowfullscreen
                  allowtransparency
                  allow="autoplay"
                ></iframe>
              </div> --}}

            </div>






     {{--      <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div> --}}





          
        </div>

        <div class="col-12 px-0  mb-4">
          @php 
          $features=$partner->partner_features()->get();
          @endphp
          @foreach($features as $feature)
          
          <div class="col-12  px-0 font-3" >
             
              <span class="fas  fa-check  pt-3" style="color:#4caf50"></span> 
          
            {{$feature->title}}
          </div>
           
          @endforeach
        </div>
        <div class="col-12 px-0">
          @php 
          $links=$partner->partner_links()->get();
          @endphp
          @foreach($links as $link)
          <a href="{{$link->url}}" style="color: #333">
          <div class="col-12 col-lg-6 px-2 py-1 mb-2 font-3" style="border:1px solid #ddd">
            <div class=" d-inline-block text-center rounded" style="height: 37px;width: 37px;background: #ddd"> 
              <span class="fal  fa-{{$link->type}}  font-3 pt-2"></span> 
            </div>
            {{$link->title}}
          </div>
          </a>
          @endforeach

         {{--  <div class="col-12 col-lg-6 px-2 py-2 mb-2 font-3" style="border:1px solid #ddd">
            <div class=" d-inline-block text-center rounded" style="height: 60px;width: 60px;background: #ddd"> 
              <span class="fal fa-file-pdf font-4 pt-3"></span>
            </div>
             هذا ملف يوضح طريقة التسجيل ببساطة
          </div>

          <div class="col-12 col-lg-6 px-2 py-2 mb-2 font-3" style="border:1px solid #ddd">
            <div class=" d-inline-block text-center rounded" style="height: 60px;width: 60px;background: #ddd"> 
              <span class="fal fa-link font-4 pt-3"></span> 
            </div>
            هذا رابط إضافي للتسجيل
          </div> --}}

          <a href="{{$partner->url}}" target="_blank">
          <div class="col-4 px-0 pt-2 pb-3 btn btn-success text-center font-2 mt-4"  style="border-radius: 0px ;  ">
                دخول الآن
              </div>
              </a>



          
        </div>
      </div>
    
    </div>
    <div class="col-12 px-0 py-0 row d-flex mx-auto mt-3" style="max-width: 1000px">
    @include('include.share')
    </div>

    
      </div>






    </div>

</div>

@endsection