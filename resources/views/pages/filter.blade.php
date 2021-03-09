@extends('layouts.app')
@section('content')
{{-- @livewire('search-test')
--}}
<div class="container mt-5"> 
  

  <div class="col-12 px-0 py-2" style="background: #f7f7f7">
      <div class="container py-3 mt-3">
          <h2 style="color: #232323" class="font-5 text-center">الفلتر الشرعي</h2> 
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



$response=\Http::get('https://eodhistoricaldata.com/api/fundamentals/'.strtoupper($key).'.US?api_token='.env('EOD_TOKEN'));

if($response->ok() && ){
  $response=$response->json();
  //dd($response['Financials']["Balance_Sheet"]["yearly"]);  
  
  $interestIncome=$response['Financials']["Income_Statement"]["yearly"][(array_keys($response['Financials']["Income_Statement"]["yearly"])[0])]["interestIncome"];  
  //[date('Y')-1 . "-06-30"]["interestIncome"];
  $totalRevenue=$response['Financials']["Income_Statement"]["yearly"][(array_keys($response['Financials']["Income_Statement"]["yearly"])[0])]["totalRevenue"];

  $filter1=(($interestIncome/$totalRevenue)*100<5)?true:false;
 //dd($filter1);
 
   
  //dd($response);
  $totaldebt=
    $response['Financials']["Balance_Sheet"]["yearly"][(array_keys($response['Financials']["Balance_Sheet"]["yearly"])[0])]["longTermDebtTotal"]+
    $response['Financials']["Balance_Sheet"]["yearly"][(array_keys($response['Financials']["Balance_Sheet"]["yearly"])[0])]["shortLongTermDebt"];
  $totalassets=$response['Financials']["Balance_Sheet"]["yearly"][(array_keys($response['Financials']["Balance_Sheet"]["yearly"])[0])]["totalAssets"]; 
  $filter2=(($totaldebt/$response["Highlights"]["MarketCapitalization"])*100<35)?true:false;

/*  dd((($totaldebt/$response["Highlights"]["MarketCapitalization"])*100));

  dd(($totaldebt/$totalassets)*100); */
  
}



/*
  $response= \Http::withHeaders([
    'Accept'=>"application/json", 
  ])->POST('https://www.bnook.net/Result.php',[
    'filter_symbol'=>$key
  ]); 

  $contents = $response->body();
 
    $DOM = new DOMDocument;
    $DOM->preserveWhiteSpace = true;
    @$DOM->loadHTML($contents);  
    $table= $DOM->getElementsByTagName('table')->item(0);
    print($table->ownerDocument->saveXML( $table ));*/

 

}
@endphp
<div class="col-12 px-0 py-5">
    <div class="col-12 px-0 py-2 container" style="min-height: 100vh">
      <div class="col-12 px-0 d-flex row justify-content-center">
        <form class="col-12 px-0">
          <div class="col-12 px-0 m-auto row d-flex" style="max-width: 600px;">
            <div class="col-9 px-0">
               <input type="" name="key" class="form-control" value="{{\Request::get('key')}}" placeholder="قم بإدخال كود السهم او الشركة">
            </div>
            <div class="col-3 px-0">
              <span class="btn btn-success rounded-0 col-12"><span class="fal fa-search"></span> بحث</span>
            </div>
          </div>
          </form>
          @if(isset($response) && isset($response["General"]["Name"]))
          <div class="col-12 px-0 d-flex mt-5 row">
            <div class="col-12 d-flex justify-content-start" >
              <div class="col-12 px-0 mx-auto row d-flex" style="max-width: 800px;">
                <div class="col-12 row d-flex px-0">
                  <div class="col-2 px-0">
                    <div class="d-inline-block mb-3" style="width: 120px;border:5px solid #fff;border-radius: 50%!important;overflow: hidden;">
                    <img src="https://eodhistoricaldata.com/{{$response["General"]["LogoURL"]}}" style="width: 100%;"> 
                    </div>
                  </div>
                  <div class="col">
                    <h4 class="font-3 " style="font-weight: bold">
                      <a href="{{$response["General"]["WebURL"]}}" class="text-end">
                    {{$response["General"]["Name"]}}
                    </a>
                </h4> 
                    <h6 class="font-1 text-left" style="    text-align: justify;line-height: 1.7">
                    {{mb_strimwidth($response["General"]["Description"], 0, 300, "...")}}</h6>
                  </div>
                </div>

                
                 
              </div>
              
            </div>
            <div class="col-12 px-0">
              <table class="table mx-auto p-2" style="max-width: 800px;background: #fff;border-radius: 10px;">
               
              <tbody>
              {{--   <tr >
                  <td class="py-2">الاساس</td>
                  <td class="py-2">القيمة</td>
                  <td class="py-2"></td>
                </tr> --}}
                <tr>
                  <td>اسم الشركة</td>
                  <td>{{$response["General"]["Name"]}}</td>
                  <td></td>
                </tr>


                {{-- <tr>
                  <td>اسم الشركة</td>
                  <td>{{$response["General"]["Name"]}}</td>
                  <td></td>
                </tr> --}}



                <tr>
                  <td>رمز الشركة</td>
                  <td>{{$response["General"]["Code"]}}</td>
                  <td></td>
                </tr>
                
                <tr>
                  <td>القيمة السوقية</td>
                  <td>{{number_format($response["Highlights"]["MarketCapitalization"],2)}} دولار</td>
                  <td></td>
                </tr>
                <tr>
                  <td>الأسهم الحرة</td>
                  <td>{{number_format($response["SharesStats"]["SharesFloat"],2)}}</td>
                  <td></td>
                </tr>

                <tr>
                  <td>دولة الشركة</td>
                  <td>{{$response["General"]["CountryName"]}}</td>
                  <td></td>
                </tr>
                <tr>
                  <td>القطاع</td>
                  <td>{{$response["General"]["Sector"]}}</td>
                  <td></td>
                </tr>
                <tr>
                  <td>الصناعة</td>
                  <td>{{$response["General"]["Industry"]}}</td>
                  <td></td>
                </tr>
                <tr>
                  <td>Insiders Ownership</td>
                  <td>{{$response["SharesStats"]["PercentInsiders"]}} %</td>
                  <td></td>
                </tr>

                
                
                
                
                
              {{--   <tr>
                  <td>رابط الموقع</td>
                  <td><a href="{{$response["General"]["WebURL"]}}"><span class="fas fa-link"></span> {{$response["General"]["WebURL"]}}</a></td>
                  <td></td>
                </tr> --}}
                <tr>
                  <td>نسبة الدخل إلى الفوائد</td>
                  <td>
                    @if($filter1)
                    <span class="fas fa-check font-3" style="color: #198754"></span>  {{number_format(($interestIncome/$totalRevenue)*100,2)}} %
                    @else
                     <span class="fas fa-times font-3" style="color: #a00"></span>  {{number_format(($interestIncome/$totalRevenue)*100,2)}} %
                    @endif
                  </td>
                  <td>
                    @if($filter1)
                    <span class="btn btn-success px-5 pt-1 pb-2" style="border-radius: 30px">شرعي</span>
                    @else
                    <span class="btn btn-danger px-5 pt-1 pb-2" style="border-radius: 30px" >غير شرعي</span>  
                    @endif

                  </td>
                </tr>
                <tr>
                  <td>نسبة الديون</td>
                  <td>
                    @if($filter2)
                    <span class="fas fa-check font-3" style="color: #198754"></span>  {{number_format(($totaldebt/$response["Highlights"]["MarketCapitalization"])*100,2)}} % 
                    @else
                     <span class="fas fa-times font-3" style="color: #a00"></span> {{number_format(($totaldebt/$response["Highlights"]["MarketCapitalization"])*100,2)}} %
                    @endif
                  </td>
                  <td>@if($filter2)
                    <span class="btn btn-success px-5 pt-1 pb-2" style="border-radius: 30px">شرعي</span>
                    @else
                    <span class="btn btn-danger px-5 pt-1 pb-2" style="border-radius: 30px" >غير شرعي</span>  
                    @endif </td>
                </tr>

                <tr>
                  <td>الشرعية</td>
                  <td>
                    @if($filter1&&$filter2)
                    <span class="btn btn-success px-5 pt-1 pb-2" style="border-radius: 30px">شرعي</span>
                    @else
                    <span class="btn btn-danger px-5 pt-1 pb-2" style="border-radius: 30px" >غير شرعي</span>  
                    @endif
                  </td>
                  <td></td>
                </tr>
                
                
              </tbody>
            </table>

            </div>
            
          </div>
          @endif
      </div> 
  </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 
@endsection
