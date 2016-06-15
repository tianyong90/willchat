<?php

namespace App\Providers;

use App\Models\Account;
use App\Models\User;
use App\Observers\AccountObserver;
use App\Observers\UserObserver;
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
        $this->registerObserver();
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

    /**
     * 注册模型观察者.
     */
    private function registerObserver()
    {
        Account::observe(AccountObserver::class);
        User::observe(UserObserver::class);
    }
}
