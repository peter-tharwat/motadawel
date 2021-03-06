<!DOCTYPE html>
<html lang="ar" dir="rtl">
   <head>
      <meta http-equiv="content-type" content="text/html; charset=utf-8">
      <meta name="author" content="TechyDevs">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>فكرة شارت</title>
      <!-- Favicon -->
      <link rel="icon" href="/assets/img/favicon.png">
      <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700;900&amp;display=swap" rel="stylesheet">
      <!-- Template CSS Files -->
	  <link rel="stylesheet" href="/assets/css//bootstrap-rtl.min.css">
      <link rel="stylesheet" href="/assets/css//bootstrap.min.css">
      
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
      <link rel="stylesheet" href="/assets/css/style-rtl.css">
   </head>
   <body class="section-bg">
      @notifyCss
      <x:notify-messages />
         <div class="col-12 justify-content-end d-flex">
           @if($errors->any())
           <div class="col-12" style="position: absolute;top: 80px;left: 10px;"> 
               {!! implode('', $errors->all('<div class="alert-click-hide alert alert-danger alert alert-danger col-9 col-xl-3 rounded-0 mb-1" style="position: fixed!important;z-index: 11;opacity:.9;left:25px;cursor:pointer;">:message</div>')) !!}
             </div>
           @endif
         </div>
      @notifyJs

      <style>
         .dashboard-area{
            overflow: unset!important;
         } 
         .nav-btn {
            display: block!important;
         } 
         .dropdown-menu-right-mm{
            left : -24px!important; 
         }
         .dropdown-menu-right{
            left : -10px!important; 
         }
      </style>
      <form method="POST" action="{{route('logout')}}" id="logout-form">@csrf</form>
      <div class="user-canvas-container">
         <div class="side-menu-close">
            <i class='bx bx-x'></i>
         </div>
         <!-- end menu-toggler -->
         <div class="user-canvas-nav">
            <div class="section-tab section-tab-2 text-center pt-4 pb-3 pl-4">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item">
                     <a class="nav-link active" id="notification-tab" data-toggle="tab" href="#notification" role="tab" aria-controls="notification" aria-selected="false">
                     إشعارات
                     </a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" id="account-tab" data-toggle="tab" href="#account" role="tab" aria-controls="account" aria-selected="true">
                     الحساب
                     </a>
                  </li>
               </ul>
            </div>
            <!-- end section-tab -->
         </div>
         <div class="user-canvas-nav-content">
            <div class="tab-content" id="myTabContent">
               <div class="tab-pane fade show active" id="notification" role="tabpanel" aria-labelledby="notification-tab">
                  <div class="user-sidebar-item">
                     <div class="notification-item">
                        <div class="list-group drop-reveal-list">
                           <a href="#" class="list-group-item list-group-item-action">
                              <div class="msg-body d-flex align-items-center">
                                 <div class="icon-element flex-shrink-0 mr-3 ml-0"><i class='bx bx-bell' ></i></div>
                                 <div class="msg-content w-100">
                                    <h3 class="title pb-1">تم ارسال طلبك</h3>
                                    <p class="msg-text">قبل دقيقتين</p>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                              <div class="msg-body d-flex align-items-center">
                                 <div class="icon-element bg-2 flex-shrink-0 mr-3 ml-0"><i class='bx bx-user' ></i></div>
                                 <div class="msg-content w-100">
                                    <h3 class="title pb-1">لقد تم إنشاء حسابك</h3>
                                    <p class="msg-text">1 منذ يوم</p>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                              <div class="msg-body d-flex align-items-center">
                                 <div class="icon-element bg-3 flex-shrink-0 mr-3 ml-0"><i class='bx bx-user' ></i></div>
                                 <div class="msg-content w-100">
                                    <h3 class="title pb-1">تم تحديث حسابك</h3>
                                    <p class="msg-text">قبل ساعتين</p>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                              <div class="msg-body d-flex align-items-center">
                                 <div class="icon-element  flex-shrink-0 mr-3 ml-0"><i class='bx bx-lock' ></i></div>
                                 <div class="msg-content w-100">
                                    <h3 class="title pb-1">تم تغيير كلمة المرور الخاصة بك</h3>
                                    <p class="msg-text">في الامس</p>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                              <div class="msg-body d-flex align-items-center">
                                 <div class="icon-element bg-5 flex-shrink-0 mr-3 ml-0"><i class='bx bx-envelope' ></i></div>
                                 <div class="msg-content w-100">
                                    <h3 class="title pb-1">تم إرسال البريد الإلكتروني الخاص بك</h3>
                                    <p class="msg-text">في الامس</p>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="#" class="list-group-item list-group-item-action">
                              <div class="msg-body d-flex align-items-center">
                                 <div class="icon-element bg-6 flex-shrink-0 mr-3 ml-0"><i class='bx bx-envelope' ></i></div>
                                 <div class="msg-content w-100">
                                    <h3 class="title pb-1">تغير بريدك الإلكتروني</h3>
                                    <p class="msg-text">في الامس</p>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                        </div>
                     </div>
                     <!-- end notification-item -->
                  </div>
               </div>
               <div class="tab-pane fade" id="account" role="tabpanel" aria-labelledby="account-tab">
                  <div class="user-action-wrap user-sidebar-panel">
                     <div class="notification-item">
                        <a href="user-dashboard.html" class="dropdown-item">
                           <div class="d-flex align-items-center">
                              <div class="avatar avatar-sm flex-shrink-0 ml-2"><img src="{{auth()->user()->getUserAvatar()}}" alt="team-img" style="max-width: 60px;"></div>
                              <span class="font-size-14 font-weight-bold">علي </span>
                           </div>
                        </a>
                        <div class="list-group drop-reveal-list user-drop-reveal-list">
                           <a href="user-dashboard.html" class="list-group-item list-group-item-action">
                              <div class="msg-body">
                                 <div class="msg-content">
                                    <h3 class="title"><i class="bx bx-user ml-2"></i>ملفي</h3>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="user-dashboard-course.html" class="list-group-item list-group-item-action">
                              <div class="msg-body">
                                 <div class="msg-content">
                                    <h3 class="title"><i class="bx bx-book ml-2"></i>دوراتي</h3>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="user-dashboard-sup.html" class="list-group-item list-group-item-action">
                              <div class="msg-body">
                                 <div class="msg-content">
                                    <h3 class="title"><i class="bx bx-cart ml-2"></i>اشتراكاتي </h3>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
						   <a href="user-invoice.html" class="list-group-item list-group-item-action">
                              <div class="msg-body">
                                 <div class="msg-content">
								
                                    <h3 class="title"><i class="bx bx-list-check ml-2"></i>الفواتير </h3>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <a href="user-dashboard-settings.html" class="list-group-item list-group-item-action">
                              <div class="msg-body">
                                 <div class="msg-content">
                                    <h3 class="title"><i class='bx bx-cog ml-2'></i>الإعدادات</h3>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                           <div class="section-block"></div>
                           <a href="/dashboard" class="list-group-item list-group-item-action">
                              <div class="msg-body">
                                 <div class="msg-content"> 
                                    <h3 class="title" onclick="$('#logout-form').submit();"><i class="bx bx-log-out-circle ml-2" ></i>تسجيل خروج</h3>
                                 </div>
                              </div>
                              <!-- end msg-body -->
                           </a>
                        </div>
                     </div>
                     <!-- end notification-item -->
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- end user-canvas-container -->
      <!-- ================================
         END USER CANVAS MENU
         ================================= -->
      <!-- ================================
         START DASHBOARD NAV
         ================================= -->
      <div class="sidebar-nav sidebar--nav">
         <div class="sidebar-nav-body">
            <div class="side-menu-close">
               <i class='bx bx-x'></i>
            </div>
            <!-- end menu-toggler -->
            <div class="author-content">
               <div class="d-flex align-items-center">
                  <div class="author-img avatar-sm">
                     <img src="{{auth()->user()->getUserAvatar()}}" alt="testimonial image" style="width: 60px;">
                  </div>
                  <div class="author-bio">
                     <h4 class="author__title">{{auth()->user()->name}} </h4>
                     <span class="author__meta">مرحبًا بك في لوحة التحكم</span>
                  </div>
               </div>
            </div>
            <div class="sidebar-menu-wrap">
               <ul class="sidebar-menu toggle-menu list-items">
                  <li class="{{Request::is('dashboard*')?'page-active':''}}"><a href="/dashboard"><i class='bx bx-stopwatch ml-2'></i>لوحة التحكم</a></li>

                  <li class="{{Request::is('user/courses*')?'page-active':''}}" ><a href="/user/courses"><i class="bx bx-book ml-2 text-color"></i>دوراتي</a></li>
				      <li class="{{Request::is('user/subscriptions*')?'page-active':''}}" ><a href="/user/subscriptions"><i class="bx bx-cart ml-2 text-color"></i>اشتراكاتي</a></li>
                  <li class="{{Request::is('user/invoices*')?'page-active':''}}"><a href="/user/invoices"><i class="bx bx-list-check ml-2 text-color"></i>فواتيري</a></li>
                  <li class="{{Request::is('user/settings*')?'page-active':''}}"><a href="/user/settings"><i class='bx bx-cog ml-2'></i>الإعدادات</a></li>
                  <li class="{{Request::is('logout*')?'page-active':''}}"><a href="#"  onclick="$('#logout-form').submit();"

                     ><i class='bx bx-log-out-circle ml-2' ></i>تسجيل خروج</a></li>
               </ul>
            </div>
            <!-- end sidebar-menu-wrap -->
         </div>
      </div>
      <section class="dashboard-area">
         <div class="dashboard-nav dashboard--nav">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="menu-wrapper row ">
                        <div class="logo mr-5">
                           <a href="/dashboard"><img src="/assets/img/logo.png" alt="logo"></a>
                           <div class="menu-toggler">
                              <i class="bx bx-bar"></i>
                              <i class='bx bx-list-minus'></i>
                           </div>
                           <!-- end menu-toggler -->
                          {{--  <div class="user-menu-open">
                              <i class="bx bx-user"></i>
                           </div> --}}
                           <!-- end user-menu-open -->
                        </div>
                        
                       {{--  <div class="nav-btn ml-auto">
                           <div class="notification-wrap d-flex align-items-center">
                              <div class="notification-item mr-2">
                                 <div class="dropdown">
                                    <a href="#" class="dropdown-toggle drop-reveal-toggle-icon" id="notificationDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-bell"></i>
                                    <span class="noti-count">4</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-reveal dropdown-menu-xl dropdown-menu-right-mm" style="left: -59px!important;">
                                       <div class="dropdown-header drop-reveal-header">
                                          <h6 class="title">لديك <strong class="text-black"> 4 </strong> إشعارات</h6>
                                       </div>
                                       <div class="list-group drop-reveal-list">
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                               
                                                <div class="msg-content w-100">
                                                   <h3 class="title pb-1">تم ارسال طلبك</h3>
                                                   <p class="msg-text">قبل دقيقتين</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                                
                                                <div class="msg-content w-100">
                                                   <h3 class="title pb-1">لقد تم إنشاء حسابك</h3>
                                                   <p class="msg-text">1 منذ يوم</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                                
                                                <div class="msg-content w-100">
                                                   <h3 class="title pb-1">تم تحديث حسابك</h3>
                                                   <p class="msg-text">قبل ساعتين</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                                
                                                <div class="msg-content w-100">
                                                   <h3 class="title pb-1">تم تغيير كلمة المرور الخاصة بك</h3>
                                                   <p class="msg-text">في الامس</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                       </div>
                                       <a href="#" class="dropdown-item drop-reveal-btn text-center">مشاهدة الكل</a>
                                    </div>
                                    <!-- end dropdown-menu -->
                                 </div>
                              </div>
                              <!-- end notification-item -->
                              <div class="notification-item mr-2">
                                 <div class="dropdown">
                                    <a href="#" class="dropdown-toggle drop-reveal-toggle-icon" id="messageDropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-envelope"></i>
                                    <span class="noti-count">4</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-reveal dropdown-menu-xl dropdown-menu-right " >
                                       <div class="dropdown-header drop-reveal-header">
                                          <h6 class="title">لديك <strong class="text-black"> 4 </strong> رسائل</h6>
                                       </div>
                                       <div class="list-group drop-reveal-list">
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                                <div class="avatar flex-shrink-0 ml-2">
                                                   <img src="assets/img/team8.jpg" alt="">
                                                </div>
                                                <div class="msg-content w-100">
                                                   <div class="d-flex align-items-center justify-content-between">
                                                      <h3 class="title pb-1">ستيفي ووندر</h3>
                                                      <span class="msg-text">منذ 3 دقائق</span>
                                                   </div>
                                                   <p class="msg-text">لا يحتاج إلى عبد مختار</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                                <div class="avatar flex-shrink-0 ml-2">
                                                   <img src="assets/img/team8.jpg" alt="">
                                                </div>
                                                <div class="msg-content w-100">
                                                   <div class="d-flex align-items-center justify-content-between">
                                                      <h3 class="title pb-1">مارك توين</h3>
                                                      <span class="msg-text">قبل 1 ساعة</span>
                                                   </div>
                                                   <p class="msg-text">لا يحتاج إلى عبد مختار</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                                <div class="avatar flex-shrink-0 ml-2">
                                                   <img src="assets/img/team8.jpg" alt="">
                                                </div>
                                                <div class="msg-content w-100">
                                                   <div class="d-flex align-items-center justify-content-between">
                                                      <h3 class="title pb-1">انزو فيراري</h3>
                                                      <span class="msg-text">قبل ساعتين</span>
                                                   </div>
                                                   <p class="msg-text">لا يحتاج إلى عبد مختار</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                          <a href="#" class="list-group-item list-group-item-action">
                                             <div class="msg-body d-flex align-items-center">
                                                <div class="avatar flex-shrink-0 ml-2">
                                                   <img src="assets/img/team8.jpg" alt="">
                                                </div>
                                                <div class="msg-content w-100">
                                                   <div class="d-flex align-items-center justify-content-between">
                                                      <h3 class="title pb-1">لوكاس سوينغ</h3>
                                                      <span class="msg-text">قبل 3 ساعات</span>
                                                   </div>
                                                   <p class="msg-text">لا يحتاج إلى عبد مختار</p>
                                                </div>
                                             </div>
                                             <!-- end msg-body -->
                                          </a>
                                       </div>
                                       <a href="#" class="dropdown-item drop-reveal-btn text-center">مشاهدة الكل</a>
                                    </div>
                                    <!-- end dropdown-menu -->
                                 </div>
                              </div>
                              <!-- end notification-item -->

                           </div>
                        </div> --}}
                        <!-- end nav-btn -->
                     </div>
                     <!-- end menu-wrapper -->
                  </div>
                  <!-- end col-lg-12 -->
               </div>
               <!-- end row -->
            </div>
            <!-- end container-fluid -->
         </div>
         <!-- end dashboard-nav -->
      </section> 

      @yield('content')
      
      <script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script src="/assets/js/jquery.min.js"></script>
      
      <script src="/assets/js/jquery-ui.js"></script>
      <script src="/assets/js/popper.min.js"></script>
	  <script src="/assets/js/bootstrap.min.js"></script>
      <script src="/assets/js/bootstrap.bundle.min.js"></script>
      <script src="/assets/js/meanmenu.min.js"></script>
      <script src="/assets/js/owl.carousel.min.js"></script>
      <script src="/assets/js/wow.min.js"></script>
      <script src="/assets/js/nice-select.min.js"></script>
      <script src="/assets/js/magnific-popup.min.js"></script>
      <script src="/assets/js/ajaxchimp.min.js"></script> 
      <script src="/assets/js/main-rtl.js"></script>
      <script type="text/javascript">
         $('a[href="{{ str_replace(env('APP_URL'), '', \Request::fullUrl())}}"]').addClass('active');
      </script>
   </body>
</html>