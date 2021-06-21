@extends('layouts.app')
@section('content')
@php  
 

$key=\Request::get('key');
if($key!=null ){



$response=\Http::get('https://eodhistoricaldata.com/api/fundamentals/'.strtoupper($key).'.US?api_token='.env('EOD_TOKEN'));

if($response->ok() ){

  try{



  $response=$response->json();

  //dd($response['Financials']["Balance_Sheet"]["yearly"]);  
 

  $interestIncome=$response['Financials']["Income_Statement"]["yearly"][(array_keys($response['Financials']["Income_Statement"]["yearly"])[0])]["interestIncome"];   
  $totalRevenue=$response['Financials']["Income_Statement"]["yearly"][(array_keys($response['Financials']["Income_Statement"]["yearly"])[0])]["totalRevenue"];

  $filter1=(($interestIncome/$totalRevenue)*100<=5 && ($interestIncome/$totalRevenue)*100>=-5 )?true:false; 
    

 


  $totaldebt=
    $response['Financials']["Balance_Sheet"]["yearly"][(array_keys($response['Financials']["Balance_Sheet"]["yearly"])[0])]["longTermDebtTotal"]+
    $response['Financials']["Balance_Sheet"]["yearly"][(array_keys($response['Financials']["Balance_Sheet"]["yearly"])[0])]["shortLongTermDebt"];
  $totalassets=$response['Financials']["Balance_Sheet"]["yearly"][(array_keys($response['Financials']["Balance_Sheet"]["yearly"])[0])]["totalAssets"]; 
  $filter2=(($totaldebt/$response["Highlights"]["MarketCapitalization"])*100<30)?true:false;

  }catch(\Exception $e){
    
  }


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

      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>الفلتر الشرعي</h2>
               <ul>
                  <li>
                     <a href="index.html">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">الفلتر الشرعي    </li>
               </ul>
            </div>
         </div>
      </div>
     <div class="blog-column-two-area ptb-100">
		   <div class="container">
		   <div class="section-title">
					   
					   <h3>يتيح لك فلتر شرعي معرفة مدى شرعية كل سهم من الاسهم </h3>
					</div>
			  <div class="row">
			
				 <div class="col-lg-3"></div>
				 <div class="col-lg-6">
					<div class="widget-sidebar">
					   <div class="sidebar-widget search">
						  <form class="search-form">
							 <input class="form-control" name="key" placeholder="قم بإدخال كود السهم أو الشركة" type="text" value="{{\Request::get('key')}}" id="filter_input" onfocus="document.getElementById('filter_input').value='';">
							 <button class="search-button" type="submit" >
							 <i class="bx bx-search"></i>
							 </button>
						  </form>



                    @if(isset($interestIncome))
          <div class="col-12 px-0 d-flex mt-5 row">
            <div class="col-12 d-flex justify-content-start" >
              <div class="col-12 px-0 mx-auto row d-flex" style="max-width: 800px;">
                <div class="col-12 row d-flex px-0">
                  <div class="px-0" style="width: 120px;">
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
                    {{mb_strimwidth($response["General"]["Description"], 0, 600, "...")}}</h6>
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
                  <td>
                  {{$response["General"]["Sector"]}}</td>
                  <td>

                     @php 
                    $filter3=true;
                    @endphp
                    @if( in_array($response["General"]["Sector"], [
                        'Financial Services'
                      ]))
                    @php 
                    $filter3=false;
                    @endphp 
                    <span class="btn btn-danger px-5 pt-1 pb-2" style="border-radius: 30px" >غير شرعي</span>   
                    @else
                     <span class="btn btn-success px-5 pt-1 pb-2" style="border-radius: 30px">شرعي</span>
                    @endif
 
                  </td>
                </tr>
                <tr>
                  <td>الصناعة</td>
                  <td>


                  {{$response["General"]["Industry"]}}</td>
                  <td>
                    @php 
                    $filter4=true;
                    @endphp
                    @if( in_array($response["General"]["Industry"], [
                        'Tobacco','Beverages-Wineries & Distilleries','Beverages-Brewers','Shell Companies','Mortgage Finance','Insurance Brokers','Insurance-Specialty','Insurance-Reinsurance','Insurance - Property & Casualty','Insurance-Life','Insurance-Diversified','Financial Data & Stock Exchanges','Financial Conglomerates','Credit Services','Capital Markets','Banks - Regional','Banks - Diversified','Asset Management'
                      ]))
                    @php 
                    $filter4=false;
                    @endphp

                    <span class="btn btn-danger px-5 pt-1 pb-2" style="border-radius: 30px" >غير شرعي</span>   
                    @else
                     <span class="btn btn-success px-5 pt-1 pb-2" style="border-radius: 30px">شرعي</span>
                    @endif
                    
                  </td>
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
{{-- 
                <tr>
                  <td>الشرعية</td>
                  <td>
                    @if($filter1&&$filter2 && $filter3 && $filter4)
                    <span class="btn btn-success px-5 pt-1 pb-2" style="border-radius: 30px">شرعي</span>
                    @else
                    <span class="btn btn-danger px-5 pt-1 pb-2" style="border-radius: 30px" >غير شرعي</span>  
                    @endif
                  </td>
                  <td></td>
                </tr> --}}
                
                
              </tbody>
            </table>

            <div class="col-12 px-0" >
              <div class="container"  >
                <div class="col-12 px-0  d-flex justify-content-center">


                  <div class="mx-auto col-12"  style="max-width: 800px">
                    @if($filter1&&$filter2 && $filter3 && $filter4)
                      <div class="col-12 alert-success text-center font-4 py-4">
                        مطابق للضوابط الشرعية الإسلامية
                      </div>
                      @else
                      <div class="col-12 alert-danger text-center font-4 py-4">
                        غير مطابق للضوابط الشرعية الإسلامية
                      </div>
                      @endif
                  </div>



                </div>
                
              </div>
            </div>


            </div>
            
          </div>
          @elseif(\Request::get('key')!=null)
          <div class="col-12 px-0 text-center">
            <div class="alert alert-warning">
              برجاء التأكد من كود السهم أو اسم الشركة
            </div>
          </div>
          @endif


					   </div>
					</div>
				 </div>
				 <div class="col-lg-3"></div>
			  </div>
		   </div>
		</div>
		<section class="courses-area-style pb-30">
         <div class="container">
		 <div class="section-title">
               <span> دوراتنا التعليمية</span>
               <h3> تعرف على أحدث الدورات التعليمية لدينا</h3>
            </div>
            <div class="row">
              @php
              $courses=\App\Models\Course::orderBy('id','DESC')->where('type','RECORDED')->withCount('ratings')->withSum('ratings','rate')->limit(3)->get();
              @endphp


              @foreach($courses as $course)

              

               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <a href="/course/{{$course->id}}-{{str_replace(' ', '_', $course->title)}}">
                      <img src="{{$course->image()}}" alt="Image">
                     </a>
                     <div class="course-content">
                        <span class="price">${{$course->price}}</span>
                        <span class="tag">الدورات التعليمية</span>
                        <a href="/course/{{$course->id}}-{{str_replace(' ', '_', $course->title)}}">
                           <h3>{{$course->title}}</h3>
                        </a>
                         <div class="col-12 ">
                           @include('templates.stars',['score'=>($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0,'size'=>14])
                              <span>
                                {{sprintf('%0.2f',($course->ratings_count!=0)?$course->ratings_sum_rate/$course->ratings_count:0)}}</span>
                              <a href="#">(تقييم {{$course->ratings_count}})</a>

                         </div>
                           
                        <div class="col-12 px-0 py-3">
                          <p style="border-bottom: 0px">{{mb_strimwidth(trim(strip_tags($course->description)), 0, 45, "...")}}</p>
                        </div>
                        
                     </div>
                  </div>
               </div>
               @endforeach

              {{--  <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <a href="single-course.html">
                     <img src="assets/img/blog.jpg" alt="Image">
                     </a>
                     <div class="course-content">
                        <span class="price">$39</span>
                        <span class="tag">الاقتصاد</span>
                        <a href="single-course.html">
                           <h3>دورة تدربية  مدفوعة هذا الشهر</h3>
                        </a>
                        <ul class="rating">
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <span>0.5</span>
                              <a href="#">(تقييم 1)</a>
                           </li>
                        </ul>
                        <p>كوروس تجريبي مدفوع هذا الشهر </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <a href="single-course.html">
                     <img src="assets/img/blog.jpg" alt="Image">
                     </a>
                     <div class="course-content">
                        <span class="price">$39</span>
                        <span class="tag">الاقتصاد</span>
                        <a href="single-course.html">
                           <h3>دورة تدربية  مدفوعة هذا الشهر</h3>
                        </a>
                        <ul class="rating">
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <i class="bx bxs-star"></i>
                           </li>
                           <li>
                              <span>0.5</span>
                              <a href="#">(تقييم 1)</a>
                           </li>
                        </ul>
                        <p>كوروس تجريبي مدفوع هذا الشهر </p>
                     </div>
                  </div>
               </div> --}}
              
              
               
            </div>
         </div>
      </section>
		
		<section class="subscribe-area ebeef5-bg-color ptb-100">
		   <div class="container">
			  <div class="subscribe-wrap">
				 <h2>انضم الينا</h2>
				 <p>اشترك معنا الآن في منصة المحلل الفني </p>
				 <div class="row">
				 <div class="col-lg-4"></div>
				 <div class="col-lg-4">
					<a href="/subscrpitions" class="default-btn wow fadeInLeft" data-wow-delay="0.9s">
                           اشترك الآن
                  </a>
				 </div>
				 <div class="col-lg-4"></div>
				 </div>
				 
				 
				 <div class="subscribe-img">
					<img src="assets/img/join.svg" alt="Image"  style="height:250px">
				 </div>
			  </div>
		   </div>
		</section>
		<div class="blog-column-three-area ptb-100">
         <div class="container">
			<div class="section-title">
               <span>شركاء نجاحنا</span>
               <h3>تعرف على شركاء نجاحنا وتمييزنا</h3>
            </div>
            <div class="row">

             @php 
               $partners=\App\Models\Partner::orderBy('id','DESC')->get();
               @endphp
               @foreach($partners as $partner)
               <div class="col-lg-4 col-md-6">
                  <div class="single-news">
                     <a href="/partner/{{$partner->id}}-{{str_replace(' ', '-', $partner->title)}}">
                        <img src="{{$partner->image()}}" alt="Image">
                     </a>
                     <div class="news-content"> 
                        <a href="/partner/{{$partner->id}}-{{str_replace(' ', '-', $partner->title)}}">
                           <h3>{{$partner->title}}</h3>
                        </a>
                        
                     </div>
                  </div>
               </div>
               @endforeach


             
               
            </div>
         </div>
      </div>
@endsection