<?php

namespace App\Http\Controllers;

use App\Repositories\AccountRepository;
use Illuminate\Http\Request;
use App\Services\Server as WechatService;
use App\Http\Requests;

/**
 * 微信响应控制器.
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
        $account = $accountRepository->getByToken($request->route('token'));

        if (!$account) {
            return;
        }

        return $this->wechatService->response($account);
    }
}
