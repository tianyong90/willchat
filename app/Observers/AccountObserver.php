<?php

namespace App\Observers;

use App\Models\Account;

/**
 * Account observer.
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
        // 自动生成 token
        $account->token = time().str_random(6);
    }

    /**
     * Saving Account.
     *
     * @param Account $account
     */
    public function saving(Account $account)
    {
        //        \Log::info($account);
    }

    /**
     * Account Saved.
     *
     * @param Account $account
     */
    public function saved(Account $account)
    {
        //        \Log::info('post saved');
    }
}
