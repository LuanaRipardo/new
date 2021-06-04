<?php

namespace App\Providers;

use App\Models\Contact;
use App\Observers\ContactObserver;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

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
        // @see: https://laravel-news.com/laravel-5-4-key-too-long-error
        Schema::defaultStringLength(191);
        setlocale(LC_TIME, 'pt-br');
        Contact::observe(ContactObserver::class);
    }
}
