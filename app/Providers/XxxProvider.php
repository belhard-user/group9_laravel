<?php

namespace App\Providers;

use App\Xxx\A;
use App\Xxx\B;
use App\Xxx\iXxx;
use Illuminate\Support\ServiceProvider;

class XxxProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->share('langs', ['en' => 'English', 'fr' => 'France']);

        \View::composer('layouts.app', function ($view) {
            $view->with('foo', 'bar');
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Xxx\iXxx', function(){
            return new B();
        });
    }
}
