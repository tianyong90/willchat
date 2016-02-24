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
    public function boot(AccountService $account)
    {
        $this->app->singleton('easywechat', function() use ($account) {

            $options = $account->getWechatOptions();

            return new \EasyWeChat\Foundation\Application($options);
        });
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

    /**
     * 提供的服务.
     *
     * @return array
     */
    public function provides()
    {
        return ['easywechat' => 'EasyWechat\\Foundation\\Application'];
    }
}
