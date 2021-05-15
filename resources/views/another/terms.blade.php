@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>شروط الاستخدام</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">شروط  الاستخدام</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="terms-conditions-area ptb-100">
         <div class="container">
            <div class="terms-conditions-wrap">
               <div class="title">
                  <span>معلومات وملاحظات</span>
                  <h2>شروط استخدام فكرة شارت</h2>
               </div>
               @php 
               $setting=\App\Models\Setting::first();
               @endphp
               <div class="col-12 main-font-inside">{!!$setting->terms!!}</div> 
            </div>
         </div>
      </section>
 @endsection