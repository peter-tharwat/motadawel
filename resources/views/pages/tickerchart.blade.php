@extends('layouts.app')
@section('content')
@php
$tickerchart=\App\Models\Tickerchart::first();
$open_acceount_videos=\App\Models\TickerchartVideo::where('video_type','OPEN_ACCOUNT')->orderBy('id','DESC')->get();
$deal_with_platform_videos=\App\Models\TickerchartVideo::where('video_type','DEAL_WITH_PLATFORM')->orderBy('id','DESC')->get();
@endphp




<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> شاهد شرح فتح الحساب</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="min-height:70vh">
        <div class="col-12 " style="min-height:50vh">
            <div class="col-12 px-0">
                <iframe id="ytplayer1" type="text/html"  style="width:100%;height: 500px;" src="" frameborder="0"></iframe>
            </div>
        </div>
        <div class="col-12" style="min-height:20vh;overflow: auto;">
            <div class="row d-flex m-0 py-3" style="width:{{$open_acceount_videos->count()*240}}px">
                @foreach($open_acceount_videos as $video)
                <div style="width: 220px;height: 230px;overflow: hidden;cursor: pointer;    box-shadow: 0px 0px 12px #dfdfdf;border-radius: 10px; " class="d-inline-block mx-2 py-1"  onclick="$('#ytplayer1').attr('src','https://www.youtube.com/embed/{{$video->video_url()}}?autoplay=0')"  >
                    <img src="{{$video->small_image()}}" style="width:100%;height: 160px;" class="py-2 rounded">
                    <div class="col-12">
                        {{$video->title}}
                    </div>
                </div>
            
            @endforeach
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">شاهد شرح التعامل مع المنصة</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body" style="min-height:70vh">
        <div class="col-12 " style="min-height:50vh">
            <div class="col-12 px-0">
                <iframe id="ytplayer2" type="text/html"  style="width:100%;height: 500px;" src="" frameborder="0"></iframe>
            </div>
        </div>
        <div class="col-12" style="min-height:20vh;overflow: auto;">
            <div class="row d-flex m-0 py-3" style="width:{{$deal_with_platform_videos->count()*240}}px">
                @foreach($deal_with_platform_videos as $video)
                <div style="width: 220px;height: 230px;overflow: hidden;cursor: pointer;    box-shadow: 0px 0px 12px #dfdfdf;border-radius: 10px; " class="d-inline-block mx-2 py-1"  onclick="$('#ytplayer2').attr('src','https://www.youtube.com/embed/{{$video->video_url()}}?autoplay=0')"  >
                    <img src="{{$video->small_image()}}" style="width:100%;height: 160px;" class="py-2 rounded">
                    <div class="col-12">
                        {{$video->title}}
                    </div>
                </div>
            
            @endforeach
            </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-light" data-bs-dismiss="modal">إغلاق</button>
      </div>
    </div>
  </div>
</div>





<div class="col-12 my-5 px-0 py-5">
    <div class="col-12 px-0">
        <div class="container px-2">
            <div class="col-12 px-0 row mx-0 mt-5  py-3">
                <div class="col-12 col-lg-6 py-2 row m-0 justify-content-center justify-content-md-start">
                    <div style="height: 250px;width: 250px;" class="rounded">
                        <img src="{{$tickerchart->logo()}}" style="width: 100%;">
                    </div>

                    <div class="col-12 py-2 px-0">
                        <h2 class="font-lg-7 font-2 py-3" style="color: #f16327;">{{$tickerchart->title}}</h2>
                    </div>
                </div>
                <div class="col-12 col-lg-6 py-2 row m-0 justify-content-center justify-content-md-end px-0">
                    <div class="col-12 col-lg-12 px-0 ms-auto">
                        <div  class="rounded d-flex justify-content-end" >
                            <img src="{{$tickerchart->image()}}" style="max-width:100%;max-height: 395px;">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 row m-0">
                <div class="col-12 col-12 col-lg-12 py-3 justify-content-center justify-content-lg-start d-flex">
                    <a href="{{$tickerchart->open_account_link}}" target="_blank">
                        <button class="btn default-btn py-3 font-lg-6 font-3 py-3" >{{$tickerchart->open_account_title}}</button>
                    </a>
                </div>
            </div>






            <div class="col-12 row mx-0 my-4 p-3 rounded" style="background:#f3f0ee">
                <div class="col-12 col-12 col-lg-6 py-3 justify-content-center justify-content-lg-start d-flex mt-3 ">
                    <div class="col-12 px-0 font-lg-4 font-3" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal1">
                        <span class="fas fa-play pe-2 font-4" style="color:#f16327"></span> شاهد شرح فتح الحساب
                    </div>
                   
                </div>
                <div class="col-12 col-lg-6 py-3 justify-content-center justify-content-lg-start d-flex mt-3">
                    <div class="col-12 px-0 font-lg-4 font-3">
                        
   
                        <a href="{{$tickerchart->telegram_link}}" target="_blank">
                            <span class="fab fa-telegram-plane pe-2 font-4" style="color:#f16327"></span> إنضم إلى قناة 
                        التيليجرام 
                        </a>
                    </div>

                </div>
                <div class="col-12 col-12 col-lg-6 py-3 justify-content-center justify-content-lg-start d-flex mt-3">
                    <div class="col-12 px-0 font-lg-4 font-3" style="cursor:pointer;" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                        <span class="fas fa-play pe-2 font-4" style="color:#f16327"></span> شاهد شرح التعامل مع المنصة
                    </div>
                </div>
                <div class="col-12 col-lg-6 py-3 justify-content-center justify-content-lg-start d-flex mt-3">
                    <div class="col-12 px-0 font-lg-4 font-3">
                        <a href="{{$tickerchart->visual_guide_link}}" target="_blank">
                        <span class="fas fa-image pe-2 font-4" style="color:#f16327"></span> حمل الدليل المصور لفتح الحساب
                        </a>
                    </div>
                </div>

            </div>


        </div>
    </div>
</div>

<script type="text/javascript">
 document.getElementById('exampleModal1')
 myModalEl.addEventListener('hidden.bs.modal', function (event) {
   $('#ytplayer1').attr('src','');
 });  
 document.getElementById('exampleModal2')
 myModalEl.addEventListener('hidden.bs.modal', function (event) {
   $('#ytplayer2').attr('src','');
 });  
 

</script>
@endsection