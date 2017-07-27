<?php

namespace App\Observers;

use App\User;

/**
 * Class UserObserver.
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
     * User created.
     *
     * @param User $user
     */
    public function created(User $user)
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
     * User saved.
     *
     * @param User $user
     */
    public function saved(User $user)
    {
        //
    }
}
