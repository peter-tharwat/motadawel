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
                                    <form action="{{route('payment.success')}}" class="paymentWidgets" data-brands="VISA MASTER MADA"></form>  
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
<script src="{{env('HYPERPAY_BASE_URL')}}/v1/paymentWidgets.js?checkoutId={{$payment_id}}"></script>   
@endsection