@extends('layouts.app')
@section('content')
      <div class="page-title-area bg-17">
         <div class="container">
            <div class="page-title-content">
               <h2>دوراتنا</h2>
               <ul>
                  <li>
                     <a href="/">
                     الرئيسية
                     </a>
                  </li>
                  <li class="active">الدورات التدريبية</li>
               </ul>
            </div>
         </div>
      </div>
      <section class="courses-area-style ptb-100">
         <div class="container">

            <div class="row">
               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <div class="course-content">
					  <div class="">
						<img src="assets/img/lectures.jpg" class="" alt="Image">
					 </div>
                        <a href="/recorded-courses"> <h3>الدورات المسجلة</h3></a>
                        <p>يوفر لك موقعنا العديد من الدورات التدريبية التي تعزز من مهاراتك </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <div class="course-content">
					  <div class="">
						<img src="assets/img/lectures.jpg" class="" alt="Image">
					 </div>
                        <a href="live-trading"> <h3>دورات اون لاين</h3></a>
                        <p>يوفر لك موقعنا العديد من الدورات التدريبية التي تعزز من مهاراتك </p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-4 col-md-6">
                  <div class="single-course">
                     <div class="course-content">
					  <div class="">
						<img src="assets/img/lectures.jpg" class="" alt="Image">
					 </div>
                        <a href="/offline-courses"> <h3>الدورات الحضورية</h3></a>
                        <p>يوفر لك موقعنا العديد من الدورات التدريبية التي تعزز من مهاراتك </p>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
@endsection
