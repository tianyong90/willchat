<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use App\Services\Wechat as WechatService;
use Illuminate\Http\Request;

/**
 * 微信消息/事件控制器.
 */
class ServerController extends Controller
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * ServerController constructor.
     *
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * 响应微信请求
     *
     * @param Request $request
     * @param string  $token
     *
     * @return mixed
     */
    public function serve(Request $request, $token)
    {
        // 根据token查询公众号信息
        $account = $this->accountRepository->findByToken($token);

        if (empty($account)) {
            return;
        }

        $wechatService = new WechatService($account);

        return $wechatService->response();
    }
}
