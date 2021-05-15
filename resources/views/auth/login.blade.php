@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>تسجل الدخول</h2>
               <ul>
                  <li>
                     <a href="index.html">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">تسجيل الدخول</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="user-area-style ptb-100">
         <div class="container">
            <div class="log-in-area">
               <div class="">
                  <div class="section-title">
                     <h2>تسجيل  الدخول</h2>
                  </div>
                  <div class="contact-form-action mb-50">
                     <form method="POST" action="{{route('login')}}">
                        @csrf
                        <div class="row">
                           <div class="col-12">
                              <div class="form-group">
                                 <label>البريد الإلكتروني</label>
                                 <input class="form-control" type="text" name="email">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <label>كلمة المرور</label>
                                 <input class="form-control" type="password" name="password">
                              </div>
                           </div>
                           {{-- <div class="col-12">
                              <div class="login-action">
                                 <span class="log-rem">
                                 <input id="remember" type="checkbox">
                                 <label for="remember">تذكرني!</label>
                                 </span>
                              </div>
                           </div> --}}
						  
                           <div class="col-12">
                              <button class="default-btn" type="submit">
                              تسجيل الدخول
                              </button>
                           </div>
						  
                           <div class="col-12">
						            <p> <a href="#product-view-one" data-bs-toggle="modal">هل نسيت كلمة المرور ؟</a></p>

                              <p>ليس لديك حساب؟ <a href="/register">حساب جديد</a></p>
                           </div>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection