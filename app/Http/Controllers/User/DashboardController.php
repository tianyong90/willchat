<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;

class DashboardController extends Controller
{
    /**
     * @var AccountRepository
     */
    protected $accountRepository;

    /**
     * DashboardController constructor.
     *
     * @param $account
     */
    public function __construct(AccountRepository $account)
    {
        $this->accountRepository = $account;
    }

    /**
     * 用户中心首页显示.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 当前用户的全部公众号
        $accounts = $this->accountRepository->all();

        return user_view('dashboard.index', compact('accounts'));
    }
}
