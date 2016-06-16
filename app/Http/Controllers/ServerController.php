<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use App\Services\Server as WechatService;
use Illuminate\Http\Request;

/**
 * 微信消息/事件控制器.
 */
class ServerController extends Controller
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
    public function serve(Request $request, AccountRepository $accountRepository)
    {
        // 根据token查询公众号信息
        $account = $accountRepository->skipCriteria()->getByToken($request->route('token'));

        if (empty($account)) {
            return;
        }

        return $this->wechatService->response($account);
    }
}
