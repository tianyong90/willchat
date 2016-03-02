<?php

namespace App\Services;

use App\Repositories\AccountRepository;
use Session;

/**
 * 公众号服务提供者.
 */
class Account
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * constructer.
     */
    public function __construct(AccountRepository $account)
    {
        $this->accountRepository = $account;
    }

    /**
     * 当前选择的公众号ID.
     *
     * @return bool|int
     */
    public function chosedId()
    {
        return Session::get('account_id');
    }

    /**
     * 当前选中的公众号.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function chosedAccount()
    {
        return $this->accountRepository->find($this->chosedId());
    }

    /**
     * 切换公众号.
     *
     * @param int $accountId 公众号的Id
     */
    public function chose($accountId)
    {
        Session::put('account_id', $accountId);
    }

    /**
     * 创建识别tag.
     *
     * @return string tag
     */
    public function buildTag()
    {
        return str_random(15);
    }

    /**
     * 创建token.
     *
     * @return string token
     */
    public function buildToken()
    {
        return str_random(10);
    }

    /**
     * 创建aesKey.
     *
     * @return string aesKey
     */
    public function buildAesKey()
    {
        return str_random(43);
    }

    /**
     * 获取SDK相关配置数据
     * 未传参数时默认获取当前选中的公众号对应的配置.
     *
     * @param null $accountId
     *
     * @return array
     */
    public function getWechatOptions($accountId = null)
    {
        $accountId = $accountId ?: $this->chosedId();

        $accountData = $this->accountRepository->find($accountId);

        $options = [
            'debug'  => true,
            'app_id' => $accountData->app_id,
            'secret' => $accountData->app_secret,
            'token'  => $accountData->token,
            // log
            'log' => [
                'level' => \Monolog\Logger::DEBUG,
                'file'  => storage_path('logs/easywechat.log'),
            ],
            // oauth
            'oauth' => [
                'scopes'   => ['snsapi_userinfo'],
                'callback' => '/examples/oauth_callback.php',
            ],
            'payment' => [
                'merchant_id' => $accountData->merchant_id,
                'key'         => $accountData->key,
                'cert_path'   => $accountData->cert_path,
                'key_path'    => $accountData->key_path,
            ],
        ];

        return $options;
    }
}
