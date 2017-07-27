<?php

namespace App\Repositories;

use App\Repositories\Criteria\UserCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Class AccountRepository.
 */
class AccountRepository extends BaseRepository
{
    use BaseRepositoryTrait;

    public function boot()
    {
        //        $this->pushCriteria(new UserCriteria());
    }

    /**
     * 根据token获取公众号.
     *
     * @param $token
     *
     * @return mixed
     */
    public function findByToken($token)
    {
        return $this->skipCriteria()->findByField('token', $token)->first();
    }

    /**
     * 查询公众号所用户ID.
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
