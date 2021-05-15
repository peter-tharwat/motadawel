@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>حساب جديد</h2>
               <ul>
                  <li>
                     <a href="index.html">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">حساب جديد</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="user-area-style ptb-100">
         <div class="container">
            <div class="registration-area">
                  <div class="section-title">
                     <h2>حساب جديد</h2>
                  </div>
                  <div class="contact-form-action">
                     <form method="POST" action="{{route('register')}}">
                        @csrf
                        <div class="row">
                           <div class="col-12"> 
                               <x-jet-validation-errors class="mb-4" />
                           </div>

                           <div class="col-12">
                              <div class="form-group">
                                 <label>الاسم كامل</label>
                                 <input class="form-control" type="text" name="name" required="">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <label>البريد الإلكتروني</label>
                                 <input class="form-control" type="email" name="email" required="">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <label>رقم الهاتف</label>
                                 <input class="form-control" type="number" name="phone">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <label>كلمة المرور</label>
                                 <input class="form-control" type="password" name="password" required="">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="form-group">
                                 <label>تأكيد كلمة المرور</label>
                                 <input class="form-control" type="password" name="password_confirmation" required="">
                              </div>
                           </div>
                           <div class="col-12">
                              <div class="row align-items-center">
                                 <div class="col-lg-6 col-sm-6">
                                    <button class="default-btn register" type="submit">
                                    سجل الآن
                                    </button>
                                 </div>
                                 <div class="col-lg-6 col-sm-6 text-right">
                                   
                                 </div>
                              </div>
                           </div>
                           <div class="col-12">
                              <p>لديك حساب بالفعل <a href="/login">تسجيل الدخول</a></p>
                           </div>
                        </div>
                     </form>
                  </div>
            </div>
         </div>
      </section>
@endsection