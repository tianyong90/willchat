<?php

namespace App\Http\Controllers;

use App\Account;
use App\Services\Wechat as WechatService;
use Illuminate\Http\Request;

/**
 * 微信支付回调控制器.
 */
class OrderNotifyController extends Controller
{
    /**
     * @var WechatService
     */
    private $wechatService;

    /**
     * ServerController constructor.
     *
     * @param WechatService $service
     */
    public function __construct(WechatService $service)
    {
        $this->wechatService = $service;
    }

    /**
     * 响应微信请求.
     *
     * @param Request $request
     * @param Account $account
     *
     * @return mixed|void
     */
    public function nofity(Request $request, Account $account)
    {
        echo 'SUCCESS';
    }
}
