<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Order; 
use App\Models\Contact; 
use App\Models\Payment; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
         Payment::observe(\App\Observers\PaymentObserver::class);
         Order::observe(\App\Observers\OrderObserver::class);
         Contact::observe(\App\Observers\ContactObserver::class);
    }
}
