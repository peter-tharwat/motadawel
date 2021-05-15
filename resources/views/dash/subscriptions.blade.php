@extends('layouts.user-dash')
@section('content') 
<section class="dashboard-area">
      
         <!-- end dashboard-nav -->
    <div class="dashboard-content-wrap">
        <div class="dashboard-bread dashboard--bread dashboard-bread-2">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="breadcrumb-content">
                            <div class="section-heading">
                                <h2 class="sec__title font-size-30">اشتراكاتي</h2>
                            </div>
                        </div><!-- end breadcrumb-content -->
                    </div><!-- end col-lg-6 -->
                    <div class="col-lg-6">
                        <div class="breadcrumb-list">
                            <ul class="list-items d-flex justify-content-end">
                                <li><a href="index.html" class="text-white">الصفحة الرئيسية</a></li>
                                <li>لوحة التحكم</li>
                                <li>الاشتراكات</li>
                            </ul>
                        </div><!-- end breadcrumb-list -->
                    </div><!-- end col-lg-6 -->
                </div><!-- end row -->
            </div>
        </div><!-- end dashboard-bread -->
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="title">قوائم الاشتراكات</h3> 
                                    </div>
                                    
                                </div>
                            </div>
                           <div class="form-content">
                               <div class="table-form table-responsive">
                                   <table class="table">
                                       <thead>
                                       <tr>
                                          <th scope="col">كود</th>
                                           <th scope="col">نوع الباقة</th>
                                           <th scope="col">تكلفتها</th>
                                           <th scope="col">عبر</th>
                                           <th scope="col">اسم المستخدم</th>
                                           <th scope="col">البريد الالكتروني</th> 
                                           <th scope="col">اشتركت</th> 
                                       </tr>
                                       </thead>
                                       <tbody>
                                        @php 
                                        $subscriptions=\App\Models\Payment::whereHas('order',function($q){
                                          $q->where('type','MOHALLEL')->where('status','DONE');
                                        })->with('order')->paginate();
                                        @endphp
                                        @foreach($subscriptions as $subscription)
                                       <tr>
                                          <th>{{$subscription->id}}</th>
                                           <th scope="row">
                                            <a href="/subscriptions" target="_blank">
                                            باقة ({{$subscription->amount}}) ريال</th>
                                            </a>
                                           <td>
                                               <div class="table-content">
                                                   <h3 class="title">{{$subscription->amount}} RAS</h3>
                                               </div>
                                           </td>
                                           <th scope="row">{{$subscription->source}}</th>
                                           
                                           <td>{{$subscription->order->mohallel_user_name}}</td>
                                           <td>{{$subscription->order->mohallel_email}}</td> 
                                           <td>{{\Carbon::parse($subscription->created_at)->diffForHumans()}}</td> 
                                       </tr>
                                       @endforeach 
                                       </tbody>
                                   </table>
                               </div>
                           </div>
                        </div><!-- end form-box -->
                    </div><!-- end col-lg-12 -->
                </div><!-- end row -->
                <div class="row">
                    <div class="col-lg-12">
                        {{$subscriptions->links()}}
                    </div>
                </div>
            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
</section><!-- end dashboard-area -->
 @endsection