<?php

namespace App\Services;

use App\User;

/**
 * 用户服务提供者.
 */
class User
{
    /**
     * @var User
     */
    private $user;

    /**
     * constructer.
     */
    public function __construct(User $account)
    {
        $this->user = $account;
    }

    /**
     * 查询头像.
     *
     * @param $id
     */
    public function getAvatar($id)
    {
        return $this->user->getAvatar($id);
    }
}
