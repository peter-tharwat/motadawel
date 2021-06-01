<?php

namespace App\Observers;

use App\Models\Payment;

class PaymentObserver
{
    /**
     * Handle the Payment "created" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function created(Payment $payment)
    {
        
        if($payment->type=="MOHALLEL" && $payment->amount==0){
            \App\Models\User::where('email',env("ADMIN_MAIL"))->first()->notifyNow(
                new \App\Notifications\GeneralNotification(
                    'قام '. $payment->user->name .'بطلب تجربة مجانية من منصة المحلل',
                    'مرحباً !',
                    ['قام '. $payment->user->name ,' بطلب تجربة مجانية من منصة المحلل الفني الإحترافية '],
                    'عرض الطلب',
                    route('payments.index').'?id='.$payment->id,
                    ['database']
                )
            );
        }
    }

    /**
     * Handle the Payment "updated" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function updated(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function deleted(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "restored" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function restored(Payment $payment)
    {
        //
    }

    /**
     * Handle the Payment "force deleted" event.
     *
     * @param  \App\Models\Payment  $payment
     * @return void
     */
    public function forceDeleted(Payment $payment)
    {
        //
    }
}
