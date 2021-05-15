@extends('layouts.user-dash')
@section('content')
      <section class="dashboard-area">
       
         <!-- end dashboard-nav -->
    <div class="dashboard-content-wrap pt-5 mt-4">
        
        <div class="dashboard-main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-box">
                            <div class="form-title-wrap">
                                <h3 class="title">قوائم الفاتورة</h3>
                                <p class="font-size-14">إظهار 1 إلى 8 من أصل 20 مُدخل</p>
                            </div>
                            <div class="form-content">
                                <div class="table-form table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th scope="col">كود</th>
                                            <th scope="col">عنوان</th> 
                                            <th scope="col">السعر</th>
                                            <th scope="col">طريقة الدفع او السداد</th>
                                            <th scope="col">يوم الدفع او الاستحقاق</th>
                                            <th scope="col">الحالة</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $payments=\App\Models\Payment::where('user_id',auth()->user()->id)->where('status','DONE')->with('order')->orderBy('id','DESC')->paginate();
                                            @endphp
                                            @foreach($payments as $payment)
                                        <tr>
                                            <th scope="row"><a href="#" class="color-text">{{$payment->id}}</a></th>
                                            <td>
                                                @if($payment->type=="COURSE")
                                                    <a href="/course/{{$payment->order->course->id}}">{{$payment->order->course->title}}</a> 
                                                @else
                                                <a href="/subscriptions" target="_blank">
                                                    باقة ( {{$payment->amount}} ) ريال
                                                </a>
                                                @endif
                                            </td>
                                             
                                            <td>{{$payment->amount}} RAS</td>
                                            <td>{{$payment->source}}</td>
                                            <td>{{\Carbon::parse($payment->created_at)->diffForHumans()}} - {{$payment->created_at}} </td>
                                            <td><span class="badge badge-success text-white py-1 px-2">تم الدفع</span></td>
                                        
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
                          {{$payments->links()}}
                    </div>
                </div>

            </div><!-- end container-fluid -->
        </div><!-- end dashboard-main-content -->
    </div><!-- end dashboard-content-wrap -->
    </section> 
@endsection