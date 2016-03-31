<?php

namespace App\Providers;

use App\Services\Account as AccountService;
use App\Services\User as UserService;
use Illuminate\Support\ServiceProvider;

class WillChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot(AccountService $account)
    {
        $this->app->singleton('easywechat', function () use ($account) {

            $options = $account->getWechatOptions();

            return new \EasyWeChat\Foundation\Application($options);
        });

        // 开放平台授权相关服务
        $this->app->singleton('openauth', function () {
            return new \App\Services\OpenAuth();
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        $this->registerAccountService();

//        $this->registerUserService();
    }

    /**
     * 注册公众号服务提供者.
     */
    protected function registerAccountService()
    {
        $this->app->singleton('willchat.account_service', function () {
            $accountRepository = app('App\Repositories\AccountRepository');

            return new AccountService($accountRepository);
        });
    }

    /**
     * 注册用户服务提供者.
     */
    protected function registerUserService()
    {
        $this->app->singleton('willchat.user_service', function () {
            $userRepository = app('App\Repositories\UserRepository');

            return new UserService($userRepository);
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
