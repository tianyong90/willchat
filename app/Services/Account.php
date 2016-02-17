<?php

namespace App\Services;

use Session;

/**
 * 公众号服务提供者.
 *
 */
class Account
{
    /**
     * constructer.
     */
    public function __construct()
    {
    }

    /**
     * 当前是否有选择公众号.
     *
     * @return bool|int
     */
    public function chosedId()
    {
        return Session::get('account_id');
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
}