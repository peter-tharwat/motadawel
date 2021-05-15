@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>سياسة الخصوصية</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">سياسة الخصوصية</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="privacy-policy-area ptb-100">
         <div class="container">
            <div class="privacy-policy-wrap">
               <div class="title">
                  <h2>خصوصية فكرة شارت</h2>
                  <p>خصوصية فكرة شارت</p>
               </div>
              
               @php 
               $setting=\App\Models\Setting::first();
               @endphp
               <div class="col-12 main-font-inside">{!!$setting->privacy!!}</div> 
            </div>
         </div>
      </section>
@endsection