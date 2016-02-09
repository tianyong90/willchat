<?php

namespace App\Http\Controllers\User;

use App\Repositories\AccountRepository;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
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
        $accounts = $this->accountRepository->lists(10);

        return user_view('dashboard.index', compact('accounts'));
    }
}
