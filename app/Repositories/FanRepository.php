<?php

namespace App\Repositories;

use App\Repositories\Criteria\AccountCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Fan Repository.
 */
class FanRepository extends BaseRepository
{
    use BaseRepositoryTrait;

    public function boot()
    {
        // $this->pushCriteria(new AccountCriteria());
    }

    /**
     * 通过openid获取fans的id，无数据时创建后返回.
     *
     * @param int $accountId 账户ID
     * @param int $openId    Open ID
     *
     * @return int fansID
     */
    public function getIdByOpenid($accountId, $openId)
    {
        /*
         * 通过openid查询
         */
        $fan = $this->model
            ->where('account_id', $accountId)
            ->where('openid', $openId)
            ->first();
        if ($fan) {
            return $fan->id;
        } else {
            /*
             * 若无返回结果，创建后返回
             */
            $insert = [
                'account_id' => $accountId,
                'openid'     => $openId,
            ];
            $this->_savePost($this->model, $insert);

            return $this->model->id;
        }
    }

    /**
     * 粉丝活跃度+1.
     */
    public function updateLiveness($request)
    {
        $model = $this->model
            ->where('account_id', $request['account_id'])
            ->where('openid', $request['openid'])
            ->first();
        if ($model) {
            $liveness = $model->liveness + 1;
        }

        return $this->_savePost($model, ['liveness' => $liveness]);
    }

    /**
     * 修改粉丝信息.
     */
    public function updateRemark($request)
    {
        $model = $this->model->find($request['id']);

        return $this->_savePost($model, ['remark' => $request['remark']]);
    }

    /**
     * 通过粉丝ID 更改粉丝所属组(支持批量).
     *
     * @param array $ids       粉丝自增ID
     * @param int   $toGroupId 粉丝组group_id
     */
    public function moveFanGroupByFansid($ids, $toGroupId)
    {
        foreach ($ids as $id) {
            $model = $this->model->find($id);
            $this->_savePost($model, ['group_id' => $toGroupId]);
        }

        return true;
    }

    /**
     * 通过粉丝ID 获取粉丝组group_id和粉丝人数[支持批量].
     *
     * @param array $ids 粉丝自增ID
     */
    public function getFanGroupByfanIds($ids)
    {
        $groupIds = [];
        $return = [];
        //根据粉丝ID查询group_id
        $fans = $this->model->find($ids);
        if ($fans) {
            foreach ($fans as $fan) {
                $groupIds[$fan['id']] = $fan['group_id'] ? $fan['group_id'] : 0;
            }

            foreach ($groupIds as $groupId) {
                $return[$groupId] = isset($return[$groupId]) ? ($return[$groupId] + 1) : 1;
            }
        }

        return $return;
    }

    /**
     * 通过粉丝ID 获取粉丝组group_id.
     *
     * @param int $ids 粉丝自增ID
     */
    public function getFanGroupByfanId($id)
    {
        $fan = $this->model->find($id);

        return $fan->groupid;
    }

    /**
     * 通过粉丝组ID 更改粉丝所属组(支持批量).
     *
     * @param array $ids       粉丝自增ID
     * @param int   $toGroupId 粉丝组group_id
     */
    public function moveFanGroupByGroupid($accountId, $fromGroupId, $toGroupId)
    {

        //根据粉丝ID查询
        return $this->model->where('account_id', $accountId)
            ->where('group_id', $fromGroupId)
            ->update(['group_id' => $toGroupId]);
    }

    /**
     * 根据 openid 和 accountId 删除.
     *
     * @param $openId
     * @param $accountId
     *
     * @return int
     */
    public function deleteByOpenId($openId, $accountId)
    {
        return $this->deleteWhere(['openid' => $openId, 'account_id' => $accountId]);
    }
}
