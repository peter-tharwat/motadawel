<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Devinweb\LaravelHyperpay\Facades\LaravelHyperpay;
class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $ENTITY_ID;
    public $ENTITY_TYPE;
    public $MOHALLEL_TYPE;
    public function index(Request $request)
    {
        
        $payments=Payment::where(function($q)use($request){
            $q->where('type','LIKE','%'.$request->key.'%');
            if($request->id!=null)
              $q->where('id',$request->id);
            if($request->order_id!=null)
              $q->where('order_id',$request->order_id);
        })->orderBy('id','DESC')->paginate();
        return view('admin.payments.index',compact('payments'));
    }
    public function make(Request $request)
    {
        $request->validate([
            'mohallel_type'=>"nullable|in:BRONZE,GOLD,DIAMOND,FREE",
            'entity_id'=>"required|in:CREDIT,MADA",
            'type'=>"required|in:COURSE,MOHALLEL",

        ]);

        if($request->type=="MOHALLEL"){
            $request->validate(["mohallel_user_name"=>"required|min:2","mohallel_email"=>"required|email"]);
        }else if ($request->type=="COURSE"){ 




          /*dd($request->all());*/
            $course = \App\Models\Course::where('id',$request->type_id)->firstOrFail(); 

            if($this->check_if_user_has_old_order_course($request->type_id)){ 
              if($course->type=="RECORDED"){
                if($course->accept_payments_untill<date('Y-m-d h:i:s')){
                  emotify('success', 'تم تجاوز موعد الاشتراك المتاح'); 
                  return back();
                } 


                //emotify('success', 'تم التحديث بنجاح'); 
              }else if ($course->type=="LIVE"){
                if($course->accept_payments_untill<date('Y-m-d h:i:s')){
                  emotify('success', 'تم تجاوز موعد الاشتراك المتاح');
                  return back(); 
                } 
              } 
            }else{
              emotify('success', 'تم الشراء مسبقاً'); 
              return redirect('/courses');
            }


            
        }



        $this->ENTITY_TYPE=$request->entity_id;
        $this->ENTITY_ID=($request->entity_id=="CREDIT")?env('HYPERPAY_CREDIT_ID'):env('HYPERPAY_MADA_ID');
        $this->MOHALLEL_TYPE=$request->mohallel_type;


        return $this->create_payment($request->type,$request->type_id,$request->mohallel_user_name,$request->mohallel_email,$request->mohallel_type);
    }

    public function check_if_user_has_old_order_course($course_id){
      $order=\App\Models\Order::where([
          ['user_id','=',auth()->user()->id],
          ['course_id','=',$course_id],
          ['status','=','DONE'],
          ['type','=','COURSE']
      ])->first();
      if($order==null){
          return 1;
      }else 
        return 0; 
    }


    public function success(Request $request){
  


        $payment = \App\Models\Payment::where('payment_id',$request['id'])->firstOrFail(); 
        if($payment->status=="PENDING" && auth()->user()->id == $payment->user_id){
            $order=\App\Models\Order::where('id',$payment->order_id)->firstOrFail();


            //$entityId="";
            if($payment->source=="CREDIT")
                $entityId=env('HYPERPAY_CREDIT_ID');
            else if($payment->source=="MADA")
                $entityId=env('HYPERPAY_MADA_ID');



            //dd($entityId);


            $url = env("HYPERPAY_BASE_URL")."/v1/query";
            $url .= "?entityId=".$entityId;
            $url .="&merchantTransactionId=".$order->id;


            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Authorization: Bearer '.env('HYPERPAY_TOKEN')));
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
 

            if(
                !(isset(( (array)json_decode($responseData,true))['payments'][0]["result"]["code"])
                && ((array)json_decode($responseData,true))['payments'][0]["result"]["code"]=="000.000.000")
              ){
                
                $payment->update(['status'=>"DONE"]);
                \App\Models\Order::where('id',$payment->order_id)->update(['status'=>"DONE"]);
                emotify('success', 'تمت عملية الدفع بنجاح');
                return redirect('/'); 

            }else{

                
                emotify('error', 'حدث خطأ أثناء عملية الدفع راجع البنك الخاص بك ');
                return redirect('/');

                
            }
                 
            return 0;


        } 
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
      return view('admin.payments.edit',compact('payment'));
        //return $payment;
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
        $payment->update(['status'=>$request->status]);
        emotify('success','تم تعديل المدفوعة بنجاح');
        return redirect()->route('payments.index');
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


    public function create_payment($type,$type_id=null,$mohallel_user_name=null,$mohallel_email=null,$mohallel_type=1)
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
                'source'=>$this->ENTITY_TYPE
            ]); 


            $url = env('HYPERPAY_URL');
            $data = "entityId=".$this->ENTITY_ID .
                        "&amount=".$course->price.
                        "&currency=SAR" .
                        "&paymentType=DB".
                        "&merchantTransactionId=".$order->id.//your unique id from the dataBase
                        //"&testMode=EXTERNAL".
                      "&billing.street1=riyadh".
                      "&billing.city=riyadh".
                      "&billing.state=riyadh".
                      "&billing.country=SA".
                      "&billing.postcode=123456" .
                      "&customer.givenName=".current(explode(' ',auth()->user()->name)).
                      "&customer.surname=".array_slice(explode(' ', auth()->user()->name), -1)[0]
                      ;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Authorization:Bearer '.env('HYPERPAY_TOKEN')));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);


           

            $payment_id=json_decode($responseData)->id;
            $payment->update(['payment_id'=>$payment_id]);



            return view('another.checkout-final',compact('payment_id'));



            /*$response=\Http::withHeaders([
                'Authorization'=>"Bearer ".env('HYPERPAY_TOKEN')
            ])->post(env('HYPERPAY_URL'),[
                'entityId'=>$this->ENTITY_ID,
                'amount'=>$course->price,
                'currency'=>'SAR',
                'paymentType'=>"DB"
            ]);
            if($response->ok()){ 
                $response=$response->json();
                return '<script src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId="'.$response['id'].'"></script><form action="'.route('payment.success',$payment->id).'" class="paymentWidgets" data-brands="VISA MASTER AMEX"></form>'; 
                
            }*/
        }else if ($type=="MOHALLEL"){

            if($mohallel_type=="BRONZE") 
                $mohallel_price= 750.00;
            else if ($mohallel_type=="GOLD")
                $mohallel_price= 1250.00;
            else if($mohallel_type=="DIAMOND")
                $mohallel_price= 2250.00;
            else if ($mohallel_type=="FREE")
                $mohallel_price=0.00;

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
                'status'=>$mohallel_type!="FREE"?'PENDING':"DONE",
                'amount'=>$mohallel_price,
                'source'=>"CREDIT",

            ]); 
            if($mohallel_type=="FREE"){
              emotify('success', 'تم بنجاح إرسال طلبك إلى الإدارة وسيتم ارسال معلومات المنصة على بريدك المسجل'); 
              return redirect('/');
            }

            // env('HYPERPAY_TOKEN') => "OGE4Mjk0MTc0ZDA1OTViYjAxNGQwNWQ4MjllNzAxZDF8OVRuSlBjMm45aA==""
            // env('HYPERPAY_URL') => "https://test.oppwa.com/v1/checkouts"
            // $this->ENTITY_ID => "8a8294174d0595bb014d05d829cb01cd" (credit)
            // $mohallel_price => 2250.00


            $url = env('HYPERPAY_URL');
            $data = "entityId=".$this->ENTITY_ID .
                        "&amount=".$mohallel_price.
                        "&currency=SAR" .
                        "&paymentType=DB".
                        "&merchantTransactionId=".$order->id.//your unique id from the dataBase
                        //"&testMode=EXTERNAL".
                      "&billing.street1=riyadh".
                      "&billing.city=riyadh".
                      "&billing.state=riyadh".
                      "&billing.country=SA".
                      "&billing.postcode=123456" .
                      "&customer.givenName=".current(explode(' ',auth()->user()->name)).
                      "&customer.surname=".array_slice(explode(' ', auth()->user()->name), -1)[0]
                      ;

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                           'Authorization:Bearer '.env('HYPERPAY_TOKEN')));
            curl_setopt($ch, CURLOPT_POST, 1);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $responseData = curl_exec($ch);
            if(curl_errno($ch)) {
                return curl_error($ch);
            }
            curl_close($ch);
           



           /* $response=\Http::withHeaders([
                'Authorization'=>"Bearer ".env('HYPERPAY_TOKEN'),
                'entityId'=>$this->ENTITY_ID,
            ])->post(env('HYPERPAY_URL'),[
                'entityId'=>$this->ENTITY_ID,
                'amount'=>$mohallel_price,
                'currency'=>'SAR',
                'paymentType'=>"DB",
                "testMode"=>"EXTERNAL",
                'merchantTransactionId'=>$order->id,
                "customer"=>[
                    'email'=>auth()->user()->email,
                    "givenName"=>current(explode(' ',auth()->user()->name)) ,
                    "surname"=>array_slice(explode(' ', auth()->user()->name), -1)[0]
                ],
                "billing"=>[
                   'street1'=> "riyadh",
                   "city"=> "riyadh",
                   "state"=> "riyadh",
                   "country"=> "SA",
                   "postcode"=> "123456"
                ] 
                
            ]); */
            $payment_id=json_decode($responseData)->id;
            $payment->update(['payment_id'=>$payment_id]);
            return view('another.checkout-final',compact('payment_id'));
 
            


           /* return $response->body();




            dd($response->body());*/

          
                /*return '<form action="'.route('payment.success',$payment->id).'" class="paymentWidgets" data-brands="VISA MASTER MADA"></form><script async src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId="'.json_decode($responseData)->id.'"></script>'; */
            
        }



    }
}

