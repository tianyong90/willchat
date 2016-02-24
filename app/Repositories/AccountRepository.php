<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Criteria\UserCriteria;

/**
 * Account Repository.
 */
class AccountRepository extends BaseRepository
{
    use BaseRepositoryTrait;

    public function boot()
    {
        $this->pushCriteria(new UserCriteria());
    }

    /**
     * 根据token获取公众号.
     *
     * @param $token
     *
     * @return mixed
     */
    public function getByToken($token)
    {
        return $this->findByField('token', $token);
    }

    /**
     * 查询公众号所用户ID
     *
     * @param $id
     *
     * @return mixed
     */
    public function getAccountUserId($id)
    {
        return $this->find($id)->user_id;
    }
}
