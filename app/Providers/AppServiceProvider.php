<?php

namespace App\Providers;

use App\Account;
use App\Observers\AccountObserver;
use App\Observers\UserObserver;
use App\User;
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
        $this->registerObservers();
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
     * Register model observers.
     */
    private function registerObservers()
    {
        Account::observe(AccountObserver::class);
        User::observe(UserObserver::class);
    }
}
