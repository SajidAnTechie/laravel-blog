<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Auth;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        // View::composer('include.header', function ($view) {
        //     $view->with('notifications', DatabaseNotification::where('notifiable_id', '!=', auth()->user()->id)->get());
        // });

    }
}
