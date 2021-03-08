@extends('layouts.app')
@section('content')
{{-- @livewire('search-test')
--}}
<div class="container mt-5"> 
  

  <div class="col-12 px-0 py-2" style="background: #f7f7f7">
      <div class="container py-3 mt-3">
          <h2 style="color: #232323" class="font-3 text-center">فلتر شرعي</h2> 
          <h4 class="font-2 text-center" style="color: #232323">يتيح لك فلتر شرعي معرفة مدى شرعية كل سهم من الاسهم</h4>
      </div>
  </div>
</div>
{{-- <div class="col-12 px-0 " style="max-height: 30px;">
    <div style="height: 120px; overflow: hidden;"><svg viewBox="0 0 500 150" preserveAspectRatio="none" style="height: 100%; width: 100%;">
            <path d="M-55.30,-42.92 C78.43,114.95 357.22,67.59 523.69,1.48 L491.53,-115.95 L-34.99,-72.53 Z" style="stroke: none; fill: #f7f7f7;"></path>
        </svg></div>
</div>  --}}
@php  
 

$key=\Request::get('key');
if($key!=null ){




  $response= \Http::withHeaders([
    'accept'=>"text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3;q=0.9",
    'origin'=>"https://www.bnook.net",
    'content-type'=>"application/x-www-form-urlencoded",
  ])->POST('https://www.bnook.net/Result.php',[
    'filter_symbol'=>$key
  ]);
  //dd($response->body());

  $contents = $response->body();
 
    $DOM = new DOMDocument;
    $DOM->preserveWhiteSpace = true;
    @$DOM->loadHTML($contents); 
    //$xpath = new DOMXPath($DOM);
    $table= $DOM->getElementsByTagName('table')->item(0);
    print($table->ownerDocument->saveXML( $table ));

 

}
@endphp
<div class="col-12 px-0 py-5">
    <div class="col-12 px-0 py-2 container" style="min-height: 100vh">
      <div class="col-12 px-0 d-flex row justify-content-center">
          <div class="col-12 px-0 m-auto row d-flex" style="max-width: 600px;">
            <div class="col-9 px-0">
               <input type="" name="" class="form-control">
            </div>
            <div class="col-3 px-0">
              <span class="btn btn-success rounded-0"><span class="fal fa-search"></span> بحث</span>
            </div>
          </div>
      </div> 
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">
  $.ajax({
  method: "POST",
  url: "https://www.bnook.net/Result.php",
  data: { filter_symbol: "msft" }
})
  .done(function( msg ) {
    console.log(mgs); 
    //alert( "Data Saved: " + msg );
  });
</script>
@endsection
