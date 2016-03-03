<?php

namespace App\Repositories;

use App\Repositories\Criteria\UserCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

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
        return $this->model->where('token', '=', $token)->first();
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
