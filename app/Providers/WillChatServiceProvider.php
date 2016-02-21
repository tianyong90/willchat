<?php

namespace App\Providers;

use App\Services\Account as AccountService;
use Illuminate\Support\ServiceProvider;

class WillChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerAccountService();

    }

    /**
     * 注册公众号服务提供者
     */
    protected function registerAccountService()
    {
        $accountRepository = new \App\Repositories\AccountRepository(app());

        $this->app->singleton('willchat.account_service', function () use ($accountRepository) {
            return new AccountService($accountRepository);
        });
    }

//    private function registerAccountService()
//    {
//
//    }

}
