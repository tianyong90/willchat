<?php

namespace App\Providers;

use App\Services\Account as AccountService;
use Illuminate\Support\ServiceProvider;

class EasyWechatServiceProvider extends ServiceProvider
{
    /**
     * 延迟加载.
     *
     * @var bool
     */
    protected $defer = true;

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
        //
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
