@extends('layouts.user-dash')
@section('content')

    <section class="dashboard-area">
       
         <!-- end dashboard-nav -->
    <div class="dashboard-content-wrap pt-5 mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">إعداد الملف الشخصي</h3>
                            </div>
                            <div class="form-content">
                                <form action="{{route('user-profile.update-info')}}" method="POST" enctype="multipart/form-data" id="user-profile-update-info-form">
                                    @csrf

                                <div class="user-profile-action d-flex align-items-center pb-4">
                                    <div class="user-pro-img">
                                        <img src="{{auth()->user()->getUserAvatar()}}" alt="user-image" style="width: 60px;">
                                    </div>
                                    <div class="upload-btn-box">
                                        
                                            <input type="file" name="file"  >
                                            {{-- <button class="theme-btn theme-btn-small" type="button">إزالة الصورة</button> --}}
                                        
                                    </div>
                                </div>
                                <div class="contact-form-action">
                                     
                                        <div class="row">
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">الاسم</label>
                                                    <div class="form-group">
                                                        <span class="la la-user form-icon"></span>
                                                        <input class="form-control" type="text" name="name" value="{{auth()->user()->name}}">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 responsive-column">
                                                <div class="input-box">
                                                    <label class="label-text">رقم الهاتف</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="text" name="phone" value="{{auth()->user()->phone}}"> 
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                           
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="button" onclick="$('#user-profile-update-info-form').submit();">حفظ التغييرات</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                   
                                </div>
                            </form>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">تغيير الايميل</h3>
                            </div>
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form action="{{route('user-profile.update-email')}}" method="post" id="user-profile-update-email">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12 col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">الايميل الحالي</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="email" name="current_email" value="{{auth()->user()->email}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 px-0"></div>
                                            <!-- end col-lg-12 -->
                                            <div class="col-12 col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">بريد إلكتروني جديد</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="email" name="email">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                            <div class="col-12 col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">بريد إلكتروني جديد مرة أخرى</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="email" name="email_confirmation" >
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                             <div class="col-lg-12">
                                                 <div class="btn-box">
                                                     <button class="theme-btn" type="button" onclick="$('#user-profile-update-email').submit()">تغيير الايميل</button>
                                                 </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">غير كلمة السر</h3>
                            </div>
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form action="{{route('user-profile.update-password')}}" method="post" id="user-profile-update-password">
                                        @csrf
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="input-box">
                                                    <label class="label-text">كلمة السر الحالية</label>
                                                    <div class="form-group">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" type="password"  name="current_password">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-6">
                                                <div class="input-box">
                                                    <label class="label-text">كلمة مرور جديدة</label>
                                                    <div class="form-group">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" type="password" name="password" >
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-6">
                                                <div class="input-box">
                                                    <label class="label-text">كلمة المرور الجديدة مرة أخرى</label>
                                                    <div class="form-group">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" type="password" name="password_confirmation" >
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="button" onclick="$('#user-profile-update-password').submit();">غير كلمة السر</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->



                    {{--
                    <div class="col-lg-6">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">إعدادات حساب الدفع</h3>
                            </div>
                            <div class="form-content">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="input-box">
                                                    <label class="label-text">الاسم على البطاقة</label>
                                                    <div class="form-group">
                                                        <span class="la la-pencil form-icon"></span>
                                                        <input class="form-control" type="text" name="text">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="input-box">
                                                    <label class="label-text">رقم البطاقة</label>
                                                    <div class="form-group">
                                                        <span class="la la-pencil form-icon"></span>
                                                        <input class="form-control" type="text" name="text" >
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-4 col-sm-4">
                                                <div class="input-box">
                                                    <label class="label-text">شهر انتهاء الصلاحية</label>
                                                    <div class="form-group">
                                                        <span class="la la-pencil form-icon"></span>
                                                        <input class="form-control" type="text" name="text" >
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-4 -->
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="input-box">
                                                    <label class="label-text">سنة انتهاء الصلاحية</label>
                                                    <div class="form-group">
                                                        <span class="la la-pencil form-icon"></span>
                                                        <input class="form-control" type="text" name="text" >
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6 col-sm-6">
                                                <div class="input-box">
                                                    <label class="label-text">CVV</label>
                                                    <div class="form-group">
                                                        <span class="la la-pencil form-icon"></span>
                                                        <input class="form-control" type="text" name="text" >
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="submit">حفظ التغييرات</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div><!-- end row -->
                                    </form>
                                </div>
                            </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-6 -->
                    --}}


                    
                </div><!-- end row -->

            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap --> 
</section>
@endsection