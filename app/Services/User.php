<?php

namespace App\Services;

use App\Repositories\UserRepository;

/**
 * 用户服务提供者.
 */
class User
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * constructer.
     */
    public function __construct(UserRepository $account)
    {
        $this->userRepository = $account;
    }

    /**
     * 查询头像.
     *
     * @param $id
     */
    public function getAvatar($id)
    {
        return $this->userRepository->getAvatar($id);
    }
}
