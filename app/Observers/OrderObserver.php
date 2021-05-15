<?php

namespace App\Observers;

use App\Models\Order;

class OrderObserver
{
    /**
     * Handle the Order "created" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function created(Order $order)
    {
        //
    }

    /**
     * Handle the Order "updated" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function updated(Order $order)
    {
        if($order->getOriginal('status')=="PENDING"&&$order->status=="DONE"){
            \App\Models\User::where('email',env("ADMIN_MAIL"))->first()->notify(
                new \App\Notifications\GeneralNotification(
                    'قام '. $order->user->name .' بشراء '. $order->type. ' وذلك بمبلغ '. $order->payment->amount,
                    'مرحباً !',
                    ['قام '. $order->user->name ,' بشراء '. $order->type, ' وذلك بمبلغ '. $order->payment->amount],
                    'عرض الطلب',
                    route('orders.index').'?id='.$order->id,
                    ['database','mail']
                )
            );
        }
    }

    /**
     * Handle the Order "deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function deleted(Order $order)
    {
        //
    }

    /**
     * Handle the Order "restored" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function restored(Order $order)
    {
        //
    }

    /**
     * Handle the Order "force deleted" event.
     *
     * @param  \App\Models\Order  $order
     * @return void
     */
    public function forceDeleted(Order $order)
    {
        //
    }
}
