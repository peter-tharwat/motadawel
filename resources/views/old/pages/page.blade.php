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
{{-- <div class="col-12 px-0 " style="max-height: 30px;">
    <div style="height: 120px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #f7f7f7;"></path>
        </svg></div>
</div>  --}}
<div class="col-12 px-0 py-0">
    <div class="col-12 px-0 py-2 container">
        <div class="col-12 px-0 d-flex row py-5">
            @for($i=0;$i<8;$i++) <div class="col-12 col-lg-3">
                <div class="col-12 p-2 course my-3" style="border:2px solid #fff;border-radius: 3px;overflow: hidden;background: #fff">
                    <img src="https://www.abertaytraining.co.uk/wp-content/themes/firstaidtrainer/img/image-seven.jpg" style="
              border-radius: inherit!important;
              width: 100%;
              height: 200px;
              object-fit: cover;
              font-family: 'object-fit: cover; object-position: bottom;';
              vertical-align: middle;
              border-radius: 0!important;
              ">
                    <div class="col-12 px-0 py-3">
                        <h4 style="line-height: 1.5;">من خلال الدورات في موقعنا</h4>
                        <h5 style="line-height: 1.5;font-size: 14px;color: #999">من خلال الدورات في موقعنا بمكنك الاطلاع على آخر الدورات المتاحة من خلالنا فيمكنك مشاكدتها او الاشتراك فيها </h5>
                    </div>
                </div>
        </div>
        @endfor
    </div>
</div>
</div>
@endsection
