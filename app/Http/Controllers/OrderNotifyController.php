<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use App\Services\Server as WechatService;
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
     * @param Request           $request
     * @param AccountRepository $accountRepository
     *
     * @return mixed|void
     */
    public function nofity(Request $request, AccountRepository $accountRepository)
    {
        echo 'SUCCESS';
    }
}
