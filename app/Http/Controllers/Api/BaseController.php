<?php

namespace App\Http\Controllers\Api;

use App\Account;
use App\Http\Controllers\Controller;
use App\Repositories\AccountRepository;
use Request;

class BaseController extends Controller
{
    /**
     * @var array|string
     */
    protected $currentAccountId;

    /**
     * @var Account
     */
    protected $currentAccount;

    /**
     * BaseController constructor.
     */
    public function __construct()
    {
        if (Request::hasHeader('AccountId')) {
            $this->currentAccountId = Request::header('AccountId');

            $this->currentAccount = app(AccountRepository::class)->find($this->currentAccountId);
        }
    }
}
