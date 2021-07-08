@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>الدعم الفني</h2>
               <ul>
                  <li>
                     <a href="index.html">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">الدعم الفني</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="main-contact-area pb-100 pt-70">
         <div class="container">
            <div class="row">
				<div class="col-lg-2"></div>
               
			   <div class="col-lg-8">
                  <div class="contact-wrap contact-pages mb-0">
                     <div class="contact-form">
                        <div class="section-title">
                           <h2>تواصل معنا</h2>
                           <p>إذا واجهتك مشكلة وسنسعد بخدمتك</p>
                        </div>
                        <form   method="post" action="{{route('contact.create')}}">
                           @csrf
                           <div class="row">
                              <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                    <label>الاسم *</label>
                                    <input type="text" name="name"  class="form-control" required data-error="الاسم مطلوب" min="2">
                                    <div class="help-block with-errors"></div>
                                 </div>
                              </div>
                              <div class="col-lg-6 col-sm-6">
                                 <div class="form-group">
                                    <label>رقم الجوال *</label>
                                    <input type="number" name="phone"  class="form-control" required data-error="رقم الجوال مطلوب" min="999999">
                                    <div class="help-block with-errors"></div>
                                 </div>
                              </div>
                              
                              <div class="col-12">
                                 <div class="form-group">
                                    <label>الموضوع / الملاحظات *</label>
                                    <textarea name="message" class="form-control" id="message" cols="30" rows="10" required data-error="الموضوع مطلوب" minlength="10"></textarea>
                                    <div class="help-block with-errors"></div>
                                 </div>
                              </div>
                              <div class="col-lg-12 col-md-12">
                                 <button type="submit" class="default-btn btn-two">
                                 أرسل الآن
                                 </button>
                                 
                                 <div class="clearfix"></div>
                              </div>
                           </div>
                        </form>
                     </div>
                  </div>
               </div>
            <div class="col-lg-2"></div>
			</div>
         </div>
      </section>
@endsection