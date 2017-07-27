<?php

namespace App\Providers;

use App\Repositories\AccountRepository;
use App\Services\User as UserService;
use Illuminate\Support\ServiceProvider;

class WillChatServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->app->singleton('easywechat', function () {
            $accountId = \Request::header('AccountId');

            $accountRepository = app(AccountRepository::class);

            $account = $accountRepository->find($accountId);

            return new \EasyWeChat\Foundation\Application([
                'debug'  => env('APP_DEBUG', false),
                'app_id' => $account->app_id,
                'secret' => $account->app_secret,
                'token'  => $account->token,
                'log'    => [
                    'level' => \Monolog\Logger::DEBUG,
                    'file'  => storage_path('logs/easywechat.log'),
                ],
            ]);
        });
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //        $this->registerUserService();
    }

    /**
     * 注册用户服务提供者.
     */
    protected function registerUserService()
    {
        $this->app->singleton('willchat.user_service', function () {
            $user = app('App\User');

            return new UserService($user);
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
