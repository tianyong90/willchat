<?php

namespace App\Observers;

use App\Models\User;

/**
 * User observer.
 */
class UserObserver
{
    /**
     * Creating User.
     *
     * @param User $user
     */
    public function creating(User $user)
    {
        //
    }

    /**
     * Saving User.
     *
     * @param User $user
     */
    public function saving(User $user)
    {
        //
    }

    /**
     * User Saved.
     *
     * @param User $user
     */
    public function saved(User $user)
    {
        //
    }
}
