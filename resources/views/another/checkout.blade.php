@extends('layouts.app')
@section('content')
		<section class="main-contact-area pb-100 pt-70" style="margin-top: 160px">
			<div class="container">
				<div class="row">
					<div class="col-lg-2"></div>
					<div class="col-lg-8">
						<div class="form-box">
                    <div class="form-title-wrap">
                        <h3 class="title">تأكيد عملية الدفع</h3>
                    </div><!-- form-title-wrap -->
                    <div class="form-content">
                        <div class="section-tab check-mark-tab text-center pb-4">
                            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">

                                
                                <li class="nav-item" >
                                    <a class="nav-link active" id="credit-card-tab" data-toggle="tab" href="#credit" role="tab" aria-controls="credit-card" aria-selected="false"  data-val="CREDIT">
                                        <i class="la la-check icon-element"></i>
                                        <img src="assets/img/payment-img.png" alt="">
                                        <span class="d-block pt-2">الدفع ببطاقة الائتمان</span>
                                    </a>
                                </li>
                                <li class="nav-item" >
                                    <a class="nav-link" id="paypal-tab" data-toggle="tab" href="#mada" role="tab" aria-controls="paypal" aria-selected="true" data-val="MADA">
                                        <i class="la la-check icon-element"></i>
                                        <img src="assets/img/mada.png" alt="">
                                        <span class="d-block pt-2">الدفع مع مدى</span>
                                    </a>
                                </li>
                                {{-- <li class="nav-item">
                                    <a class="nav-link" id="payoneer-tab" data-toggle="tab" href="#payoneer" role="tab" aria-controls="payoneer" aria-selected="true">
                                        <i class="la la-check icon-element"></i>
                                        <img src="assets/img/stc.png" alt="">
                                        <span class="d-block pt-2">الدفع مع STC PAY</span>
                                    </a>
                                </li> --}}
                            </ul>
                        </div><!-- end section-tab -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active"  role="tabpanel" aria-labelledby="credit-card-tab">
                                <div class="contact-form-action">
                                    <form method="post" action="{{route('make.payment')}}">
                                        @csrf
                                        <div class="row" > 
                                            <div class="col-12 d-flex justify-content-center">



                                                <div class="col-12">
                                                    

                                                <input type="hidden" name="entity_id" value="CREDIT"  id="entity_id">
                                                    <input type="hidden" name="type" value="{{\Request::get('type')}}">
                                                    <input type="hidden" name="type_id" value="{{\Request::get('type_id')}}">
                                                 
                                                    <input type="hidden" name="mohallel_type" value="{{\Request::get('mohallel_type')}}" >

                                                    @if(\Request::get('type')=="MOHALLEL")
                                                    <div class="col-12">
                                                        <div class="input-box">
                                                            <label class="label-text">إسم مستخدم المستخدم في تكرتشارت</label>
                                                            <div class="form-group">
                                                                <span class="la la-credit-card form-icon"></span>
                                                                <input class="form-control" type="text" name="mohallel_user_name" placeholder="إسم مستخدم تكر تشارت" required="">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-12">
                                                        <div class="input-box">
                                                            <label class="label-text">رقم الجوال المستخدم في تكر تشارت</label>
                                                            <div class="form-group">
                                                                <span class="la la-credit-card form-icon"></span>
                                                                <input class="form-control" type="number" name="mohallel_phone" placeholder="رقم الجوال المستخدم في تكر تشارت" required="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endif

                                                    
                                                    
                                                    <!--package1-package2-package3-->



                                                    
                                                    <button class="theme-btn px-4 py-3" type="submit">تأكيد الدفع</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div>
                                    </form>
                                </div><!-- end contact-form-action -->
                            </div><!-- end tab-pane-->
                            <div class="tab-pane fade" id="paypal" role="tabpanel" aria-labelledby="paypal-tab">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">عنوان البريد الإلكتروني</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="email" name="email" placeholder="عنوان البريد الإلكتروني">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">كلمه السر</label>
                                                    <div class="form-group">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" type="text" name="text" placeholder="أدخل كلمة المرور">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="submit">تسجيل الدخول</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div>
                                    </form>
                                </div><!-- end contact-form-action -->
                            </div><!-- end tab-pane-->
                            <div class="tab-pane fade" id="payoneer" role="tabpanel" aria-labelledby="payoneer-tab">
                                <div class="contact-form-action">
                                    <form method="post">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">عنوان البريد الإلكتروني</label>
                                                    <div class="form-group">
                                                        <span class="la la-envelope form-icon"></span>
                                                        <input class="form-control" type="email" name="email" placeholder="عنوان البريد الإلكتروني">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-6">
                                                <div class="input-box">
                                                    <label class="label-text">كلمه السر</label>
                                                    <div class="form-group">
                                                        <span class="la la-lock form-icon"></span>
                                                        <input class="form-control" type="text" name="text" placeholder="أدخل كلمة المرور">
                                                    </div>
                                                </div>
                                            </div><!-- end col-lg-6 -->
                                            <div class="col-lg-12">
                                                <div class="btn-box">
                                                    <button class="theme-btn" type="submit">تسجيل الدخول</button>
                                                </div>
                                            </div><!-- end col-lg-12 -->
                                        </div>
                                    </form>
                                </div><!-- end contact-form-action -->
                            </div><!-- end tab-pane-->
                        </div><!-- end tab-content -->
                    </div><!-- end form-content -->
                </div>
					</div>
					<div class="col-lg-2"></div>
				</div>
			</div>
			
			
			
		
		</section>
        <script type="text/javascript">
            $('.nav-link').on('click',function(){
                $('.nav-link').removeClass('active');
                $(this).addClass('active'); 
                $('#entity_id').val($(this).attr('data-val'));
                console.log($(this).attr('data-val'));
            });
        </script>
     @endsection