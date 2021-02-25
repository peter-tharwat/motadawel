<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $payments=Payment::where(function($q)use($request){
            $q->where('type','LIKE','%'.$request->key.'%');
        })->orderBy('id','DESC')->paginate();
        return view('admin.payments.index',compact('payments'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }


    public function create_payment($type,$type_id=null,$mohallel_user_name=null,$mohallel_email=null,$motadawel_type=1)
    {
        if($type=="COURSE"){  

            $course = \App\Models\Course::where('id',$type_id)->firstOrFail();

            $order=\App\Models\Order::create([
                'user_id'=>auth()->user()->id,
                'course_id'=>$course->id, 
                'type'=>$type,
                'status'=>'PENDING' 
            ]);
            $payment=\App\Models\Payment::create([
                'user_id'=>auth()->user()->id,
                'order_id'=>$order->id,
                'type'=>$order->type,
                'status'=>'PENDING' ,
                'amount'=>$course->price,
                'source'=>"CREDIT"
            ]); 
            $response=\Http::withHeaders([
                'Authorization'=>"Bearer ".env('HYPERPAY_TOKEN')
            ])->post(env('HYPERPAY_URL'),[
                'entityId'=>"8a8294174b7ecb28014b9699220015ca",
                'amount'=>$course->price,
                'currency'=>'SAR',
                'paymentType'=>"DB"
            ]);
            if($response->ok()){ 
                $response=$response->json();
                return '<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId="'.$response['id'].'"></script><form action="'.route('payment.success',$payment->id).'" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>'; 
                
            }
        }else if ($type=="MOHALLEL"){
            $modawadel_price= 1000.00;
            $order=\App\Models\Order::create([
                'user_id'=>auth()->user()->id,
                'course_id'=>NULL,
                'mohallel_user_name'=>$mohallel_user_name,
                'mohallel_email'=>$mohallel_email,
                'type'=>$type,
                'status'=>'PENDING' 
            ]);
            $payment=\App\Models\Payment::create([
                'user_id'=>auth()->user()->id,
                'order_id'=>$order->id,
                'type'=>$order->type,
                'status'=>'PENDING' ,
                'amount'=>$modawadel_price,
                'source'=>"CREDIT"
            ]); 
            $response=\Http::withHeaders([
                'Authorization'=>"Bearer ".env('HYPERPAY_TOKEN')
            ])->post(env('HYPERPAY_URL'),[
                'entityId'=>"8a8294174b7ecb28014b9699220015ca",
                'amount'=>$modawadel_price,
                'currency'=>'SAR',
                'paymentType'=>"DB"
            ]);
            /*dd($response->body());*/
            if($response->ok()){ 
                $response=$response->json();
                return '<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId="'.$response['id'].'"></script><form action="'.route('payment.success',$payment->id).'" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>'; 
                
            }
        }



    }
}

