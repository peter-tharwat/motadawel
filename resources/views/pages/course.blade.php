@extends('layouts.app')
@section('content')
 
{{-- <div class="col-12 px-0 py-5" style="background: #22359e">
  <div class="container py-5 mt-3">
    <h2 style="color: #fff">إسم الكورس </h2>
    <h4 style="color: #fff" class="mt-3">وصف الكورس ، هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى</h4>
  </div>
</div> --}}
<div class="col-12 px-0 " style="max-height: 30px;">
<div style="height: 120px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;"><path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #f7f7f7;"></path></svg></div>
</div>
<div class="col-12 px-0 py-5">
  

<div class="col-12 px-0 py-5 container" >
  
<div class="col-12 px-0 d-flex row py-5">
      
    <div class="col-12 px-0 row d-flex">
      <div class="col-12 col-lg-9">

        <h2 class="mb-3">عنوان الدورة سيتم كتابتها هنا </h2>

        <div class="col-12 py-3 px-0">
          <img src="https://ebtikar-it.com/wp-content/uploads/2017/01/BANNER-031-1.jpg" style="width: 100%;border-radius: 5px"> 
        </div>

        
        <h4 style="line-height: 1.9">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</h4>
        
        <div class="col-12 px-0 py-3" style="font-size: 18px">
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
          </div>
          <div class="col-12 px-0 py-2">  
            <span class="fas fa-check" style="color: #ffa725"></span>  هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة
          </div>
          
        </div>
      </div>
      <div class="col-12 col-lg-3">
        
        <div class="col-12 p-2 my-3" style="border:2px solid #f1f1f1;border-radius: 3px;overflow: hidden;">
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
            <h4 style="line-height: 1.5;" class="text-center">احجز الدورة الآن</h4>
            <div class="col-12 px-0 ">
              <div class="col-12 px-0 pt-2 pb-3 btn btn-success text-center font-2"  style="border-radius: 60px ; background: #ffa725;border-color: #ffa725">
                إحجز الآن
              </div>
            </div>
          </div>
        </div>



      </div>

    </div>
      @for($i=0;$i<8;$i++)
      <div class="col-12 col-lg-3"  >
        
      </div>
      @endfor

    
      </div>






    </div>

</div>

@endsection