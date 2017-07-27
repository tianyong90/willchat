<?php

namespace App\Observers;

use App\Account;

/**
 * Class AccountObserver.
 */
class AccountObserver
{
    /**
     * Creating Account.
     *
     * @param Account $account
     */
    public function creating(Account $account)
    {
        if (!$account->token) {
            // 自动生成 token
            $account->token = time().strtolower(str_random(6));
        }
    }

    /**
     * @param Account $account
     */
    public function created(Account $account)
    {
        // TODO: 添加公众号后同步菜单、粉丝数据
    }

    /**
     * Saving Account.
     *
     * @param Account $account
     */
    public function saving(Account $account)
    {
        //
    }

    /**
     * Account Saved.
     *
     * @param Account $account
     */
    public function saved(Account $account)
    {
        //
    }
}
