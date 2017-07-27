<?php

namespace App\Repositories;

use App\Repositories\Criteria\AccountCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * FanGroup Repository.
 */
class FanGroupRepository extends BaseRepository
{
    use BaseRepositoryTrait;

    public function boot()
    {
        //        $this->pushCriteria(new AccountCriteria());
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
        return $this->model->where('group_id', '=', $groupId)->where('account_id', '=', get_chosed_account())->first();
    }

    /**
     * @param int    $groupId
     * @param string $groupName
     *
     * @return mixed
     */
    public function updateGroup($groupId, $groupName)
    {
        $id = $this->getGroupByGroupid($groupId)->id;

        return $this->update(['name' => $groupName], $id);
    }

    /**
     * update.
     *
     * @param int   $accountId Account ID
     * @param int   $addId     加粉丝的组自增ID
     * @param array $groupIds  粉丝组group_id
     * @param array $count     数量
     */
    public function cutFanCount($accountId, $addId, $groupIds, $count)
    {
        /*
         * 增加
         */
        $addFanGroup = $this->model->find($addId);
        $_saveAddInfo['fan_count'] = $addFanGroup->fan_count + $count;
        $this->_savePost($addFanGroup, $_saveAddInfo);

        /*
         * 减掉
         */
        foreach ($groupIds as $groupId => $groupCount) {
            $cutFanGroup = $this->getGroupByGroupid($accountId, $groupId);
            $_saveCutInfo['fan_count'] = $cutFanGroup->fan_count - $groupCount;
            $this->_savePost($cutFanGroup, $_saveCutInfo);
        }
    }

    /**
     * 删除指定公众号的本地分组数据.
     *
     * @param null $accountId
     */
    public function deleteAll($accountId = null)
    {
        $accountId = $accountId ?: get_chosed_account();

        $this->model->where('account_id', '=', $accountId)->delete();
    }
}
