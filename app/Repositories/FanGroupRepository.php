<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use App\Repositories\Criteria\AccountCriteria;

/**
 * FanGroup Repository.
 */
class FanGroupRepository extends BaseRepository
{
    public function boot()
    {
        $this->pushCriteria(new AccountCriteria());
    }

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return "App\\Models\\FanGroup";
    }

    /**
     * 使用粉丝组group_id 查找分组.
     *
     * @param $groupId
     *
     * @return mixed
     */
    public function getGroupByGroupid($groupId)
    {
        return $this->findByField('groupid', $groupId);
    }
}
