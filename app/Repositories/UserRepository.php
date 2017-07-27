<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\CacheableInterface;
use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * User Repository.
 */
class UserRepository extends BaseRepository implements CacheableInterface
{
    use BaseRepositoryTrait;
    use CacheableRepository;

    /**
     * 查询用户头像.
     *
     * @param $id
     *
     * @return mixed
     */
    public function getAvatar($id)
    {
        return $this->find($id)->avatar;
    }

    /**
     * 设置用户头像.
     *
     * @param string $avatarPath
     * @param int    $id
     *
     * @return mixed
     */
    public function setAvatar($avatarPath, $id)
    {
        return $this->update(['avatar' => $avatarPath], $id);
    }
}
