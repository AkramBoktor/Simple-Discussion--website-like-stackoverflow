<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use App\Channel;
use View;
class AppServiceProvider extends ServiceProvider
{
    

  public function boot()

 {
    Schema::defaultStringLength(191);

    view::share('channels',Channel::all());

 }
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
