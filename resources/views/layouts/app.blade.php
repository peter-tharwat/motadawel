<!doctype html>
<html lang="ar" dir="rtl">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="/assets/js/jquery.min.js"></script>

      <link rel="stylesheet" href="/assets/css/bootstrap.rtl.min.css">
      <link rel="stylesheet" href="/assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="/assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="/assets/css/magnific-popup.min.css">
      <link rel="stylesheet" href="/assets/css/animate.min.css">
      <link rel="stylesheet" href="/assets/css/boxicons.min.css">
      <link rel="stylesheet" href="/assets/css/flaticon.css">
      <link rel="stylesheet" href="/assets/css/meanmenu.min.css">
      <link rel="stylesheet" href="/assets/css/nice-select.min.css">
      <link rel="stylesheet" href="/assets/css/odometer.min.css">
      <link rel="stylesheet" href="/assets/css/style.css">
      <link rel="stylesheet" href="/assets/css/responsive.css">
      <link rel="stylesheet" href="/assets/css/rtl.css">
      <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/cust-fonts.css">
      <link rel="stylesheet" href="/css/ckin.css">
      <script src="/js/ckin.js"></script>
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
      <link rel="stylesheet" type="text/css" href="https://nafezly.com/css/fontawsome.min.css">
      <link rel="stylesheet" type="text/css" href="/css/responsive-fonts.css">
      <link rel="icon" type="image/png" href="/assets/img/favicon.png">
      <title>فكرة شارت </title>
      @php 
      $setting=\App\Models\Setting::first();
      @endphp
   </head>
   <body>
      <style type="text/css">
         .main-font-inside ,.main-font-inside *{
            font-family:  var(--font-family)!important;
         }

         .nav-link{
             /*font-weight: bold!important;*/
             font-size: 16px!important;
             margin: 0px 10px!important;
         }
      </style>
      <form method="POST" action="{{route('logout')}}" id="logout-form">@csrf</form>
      @notifyCss
      


      <div class="loader-wrapper">
         <div class="loader">
            <div class="dot-wrap">
               <span class="dot"></span>
               <span class="dot"></span>
               <span class="dot"></span>
               <span class="dot"></span>
            </div>
         </div>
      </div>
      <div class="navbar-area navbar-area-two">
         <div class="mobile-nav">
            <a href="/" class="logo">
            <img src="/assets/img/logo.png" alt="Logo">
            </a>
         </div>
         <div class="main-nav">
            <div class="container-fluid">
               <nav class="navbar navbar-expand-md">
                  <a class="navbar-brand" href="/">
                  <img src="/assets/img/logo.png" alt="Logo">
                  </a>
                  <div class="collapse navbar-collapse mean-menu">
                     <ul class="navbar-nav ps-2">
                        <li class="nav-item"><a href="/" class="nav-link"> الرئيسية</a></li>
                  
                        <li class="nav-item"><a href="/courses" class="nav-link">الدورات</a>
                        </li>
                  <li class="nav-item"><a href="/filter" class="nav-link">الفلتر الشرعي</a>
                        </li>
                  <li class="nav-item"><a href="/ideas" class="nav-link">أراء وتحليلات</a>
                        </li>
                  <li class="nav-item"><a href="/lectures" class="nav-link">المحاضرات التعليمية</a>
                        </li><li class="nav-item"><a href="/blog" class="nav-link">المدونة</a>
                        </li>
                  </li><li class="nav-item"><a href="/mohallel" class="nav-link">منصة المحلل الفني</a>
                        </li>
                  <li class="nav-item"><a href="/partners" class="nav-link">شركاء النجاح</a>
                        </li>
                     </ul>
                     <div class="others-option ms-auto">
                        @if(auth()->check())
                        <!-- Example split danger button -->
                        <div class="btn-group">
                           <a href="{{\Auth::user()->power=="ADMIN"?'/admin':'/dashboard'}}">
                          <button type="button" class="btn default-btn" style="font-weight: normal;">لوحة التحكم</button>
                          </a>
                          <button type="button" class="btn default-btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="$('#logout-form').submit();" >تسجيل خروج</a></li> 
                          </ul>
                        </div>
 
                        @else
                        <div class="register">
                           <a href="/login" class="default-btn">
                           تسجيل الدخول / حساب جديد
                           </a>
                        </div> 
                        @endif
                     </div>
                  </div>
               </nav>
            </div>
         </div>
         <x:notify-messages />
         <div class="col-12 justify-content-end d-flex">
           @if($errors->any())
           <div class="col-12" style="position: absolute;top: 80px;left: 10px;"> 
               {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;">:message</div>')) !!}
             </div>
           @endif
         </div>

         <div class="others-option-for-responsive">
            <div class="container">
               <div class="dot-menu">
                  <div class="inner">
                     <div class="circle circle-one"></div>
                     <div class="circle circle-two"></div>
                     <div class="circle circle-three"></div>
                  </div>
               </div>
               <div class="container">
                  <div class="option-inner">
                     <div class="others-option justify-content-center d-flex align-items-center">
                        
                         @if(auth()->check())
                        <!-- Example split danger button -->
                        <div class="btn-group">
                           <a href="{{\Auth::user()->power=="ADMIN"?'/admin':'/dashboard'}}">
                          <button type="button" class="btn default-btn" style="font-weight: normal;">لوحة التحكم</button>
                          </a>
                          <button type="button" class="btn default-btn dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                            <span class="visually-hidden"></span>
                          </button>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#" onclick="$('#logout-form').submit();" >تسجيل خروج</a></li> 
                          </ul>
                        </div>
 
                        @else
                        <div class="register">
                           <a href="/login" class="default-btn">
                           تسجيل الدخول / حساب جديد
                           </a>
                        </div> 
                        @endif


                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      @yield('content')
      <footer class="footer-top-area pt-20 ">
         <div class="container">
            <div class="row">
               <div class="col-lg-4 col-sm-6">
                  <div class="footer-widget">
                     <h3>تواصل معنا</h3>
                     <ul class="address">
                        <li>
                           <i class="bx bxs-envelope"></i>
                           <a href="#">{{$setting->email}}</a>
                        </li>
                        <li>
                           <i class="bx bxs-phone-call"></i>
                           <a href="tel:{{$setting->phone}}">{{$setting->phone}}</a> 
                        </li>
						
                     </ul>
                  </div>
               </div>
               <div class="col-lg-4 col-sm-6">
                  <div class="footer-widget">
                     <h3>اهم الروابط</h3>
                     <ul class="link">
                        <li><a href="/">الرئيسية</a></li>
                        <li><a href="/about">حولنا</a></li>
                        <li><a href="/courses">الدورات</a></li>
                        <li><a href="/filter">فلتر شرعي</a></li>
                        <li><a href="/ideas">أراء وتحليلات</a></li>
                        <li><a href="/lectures">المحاضرات التعليمية</a></li>
                     </ul>
                  </div>
               </div>
			   <div class="col-lg-4 col-sm-6">
                  <div class="footer-widget">
                     <h3>اهم الروابط</h3>
                    
                     <ul class="link">
                        <li><a href="/blog">المدونة</a></li>
                        <li><a href="/mohallel">المحلل الفني الإحترافي</a></li>
                        <li><a href="/partners">شركاء النجاح</a></li>
                        <li><a href="/terms">شروط الاستخدام</a></li>
                        <li><a href="/privacy">سياسة الخصوصية</a></li>
                        <li><a href="/support">الدعم الفني</a></li>
                     </ul>
                  </div>
               </div>
			   <div class="col-lg-12 col-sm-6">
                  <div class="footer-widget">
                     




                     <div class="Social-media">
                     @if($setting->snap_link!=null)
						  <a href="{{$setting->snap_link}}"><i class="bx bxl-snapchat"></i></a>
                    @endif
                    @if($setting->twitter_link!=null)
						  <a href="{{$setting->twitter_link}}"><i class="bx bxl-twitter"></i></a>
                    @endif
                    @if($setting->youtube_link!=null)
						  <a href="{{$setting->youtube_link}}"><i class="bx bxl-youtube"></i></a>
                    @endif
                    @if($setting->whatsapp_phone!=null)
						  <a href="https://api.whatsapp.com/send/?phone={{$setting->whatsapp_phone}}&amp;text&amp;app_absent=0"><i class="bx bxl-whatsapp"></i></a>
                    @endif
                    @if($setting->instagram_link!=null)
						  <a href="{{$setting->instagram_link}}"><i class="bx bxl-instagram-alt"></i></a>
						  @endif
                    @if($setting->telegram_link!=null)
                    <a href="{{$setting->telegram_link}}"><i class="fab fa-telegram" style="color:#2196f3"></i></a>
                    @endif
						</div>
                  </div>
               </div>
			   

            </div>
         </div>
      </footer>
      <footer class="footer-bottom-area">
         <div class="container">
            <div class="copyright-wrap">
				<p>
				<i class="bx bx-copyright"></i>جميع الحقوق محفوظة
				</b>لفكرة  شارت  2021 . 
				</p>
				<p>
				حقوق التصميم والبرمجة محفوظة <a href="https://shannanadv.com/" target="blank">    لوكالة  شنان للدعاية والإعلان</a>
				</p>
			</div>
         </div>
      </footer>
      <div class="go-top">
         @if(Request::is('mohallel/*'))
         <a href="https://api.whatsapp.com/send/?phone={{$setting->whatsapp_phone_mohallel}}&text&app_absent=0"><i class='bx bxl-whatsapp'></i></a>
         @else
         <a href="https://api.whatsapp.com/send/?phone={{$setting->whatsapp_phone}}&text&app_absent=0"><i class='bx bxl-whatsapp'></i></a>
         @endif
          {{-- <a href="https://api.whatsapp.com/send/?phone={{$setting->whatsapp_phone}}&text&app_absent=0"><i class='bx bxl-whatsapp'></i></a> --}}
      </div>
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
      <script src="/assets/js/bootstrap.bundle.min.js"></script>
      <script src="/assets/js/meanmenu.min.js"></script>
      <script src="/assets/js/owl.carousel.min.js"></script>
      <script src="/assets/js/wow.min.js"></script>
      <script src="/assets/js/nice-select.min.js"></script>
      <script src="/assets/js/magnific-popup.min.js"></script>
      <script src="/assets/js/ajaxchimp.min.js"></script>

      <script src="/assets/js/jarallax.min.js"></script>
      <script src="/assets/js/appear.min.js"></script>
      <script src="/assets/js/odometer.min.js"></script>
      <script src="/assets/js/form-validator.min.js"></script>
      <script src="/assets/js/contact-form-script.js"></script>
      <script src="/assets/js/ajaxchimp.min.js"></script>
       
      <script src="/assets/js/custom.js"></script>
      <script type="text/javascript">
         // Others Option For Responsive JS
      $(".others-option-for-responsive .dot-menu").on("click", function(){
         $(".others-option-for-responsive .container .container").toggleClass("active");
      });

      </script>
      <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>

      <style type="text/css">
         .zoomArea {
           overflow: hidden;
           border:1px solid
         }

         .zoomArea > img {
           width: 100%;
           height: 100%;
         }
      </style>
      @notifyJs
   </body>
</html>