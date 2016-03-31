<?php

namespace App\Http\Middleware;

use App\Repositories\AccountRepository;
use Closure;

class Account
{
    /**
     * @var AccountRepository
     */
    private $accountRepository;

    /**
     * Account constructor.
     *
     * @param AccountRepository $accountRepository
     */
    public function __construct(AccountRepository $accountRepository)
    {
        $this->accountRepository = $accountRepository;
    }

    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure                 $next
     *
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->checkAccount() == false) {
            if ($request->ajax()) {
                return response('Unauthorized.', 401);
            } else {
                return redirect(user_url('/'));
            }
        }

        return $next($request);
    }

    /**
     * 是否已经选择了公众号并且公众号属于当前登录用户.
     *
     *
     * @return bool
     */
    private function checkAccount()
    {
        // 当前选中的公众号ID
        $accountId = get_chosed_account();

        if (empty($accountId)) {
            return false;
        }

        //选中的公众号所属用户ID
        $accountUserId = $this->accountRepository->getAccountUserId($accountId);

        if ($accountUserId !== auth()->user()->id) {
            return false;
        }

        return true;
    }
}
