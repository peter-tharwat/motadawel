<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Order; 
use App\Models\Contact; 
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
         Order::observe(\App\Observers\OrderObserver::class);
         Contact::observe(\App\Observers\ContactObserver::class);
    }
}
