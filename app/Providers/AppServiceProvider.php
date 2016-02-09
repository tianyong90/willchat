<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //设置地区
        \Carbon\Carbon::setLocale('zh');

//        view()->composer(['user.public.base', 'user.public.baseindex'], function($view){
//            $view->with('user', ['name'=>'tian', 'avatar'=>'abc.jpg']);
//        });
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
