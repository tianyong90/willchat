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

    /**
     * 获取本地粉丝组列表.
     *
     * @author yhsong <13810377933@163.com>
     *
     * @param Int    $accountId AccountID
     * @param Int    $pageSize  偏移量
     * @param String $request
     *
     * @return Array
     */
    public function lists($accountId, $pageSize, $request)
    {
        if (!$request->sort_by) {
            $request->sort_by = 'group_id';
        }

        return $this->model
            ->where('account_id', $accountId)
            ->orderBy($request->sort_by, 'asc')
            ->paginate($pageSize);
    }

    /**
     * store.
     *
     * @param Int   $accountId AccountID
     * @param array $input
     */
    public function store($accountId, $input)
    {

        /*
         * 准备插入的数据
         */
        $_saveInfo['group_id'] = -1;
        $_saveInfo['account_id'] = $accountId;
        $_saveInfo['title'] = $input->title;
        $_saveInfo['fan_count'] = 0;
        $_saveInfo['is_default'] = 0;

        /*
         * 保存
         */
        $this->_savePost($this->model, $_saveInfo);

        /*
         * 返回生成的ID
         */
        return $this->model->id;
    }

    /**
     * update.
     *
     * @param array $input Request
     */
    public function update($accountId, $input)
    {
        $model = $this->getGroupByid($accountId, $input['id']);

        return $this->_savePost($model, $input);
    }

    /**
     * Delete.
     *
     * @param int   $id    粉丝组自增ID
     * @param array $input Request
     */
    public function delete($accountId, $id)
    {

        /*
         * 1 查找粉丝组数据
         */
        $model = $this->getGroupByid($accountId, $id);

        /*
         * 2 验证这个组能不能删除
         */
        if ($model && !$model->is_default) {
            /*
             * 2.1) 本地粉丝所属组更新为"默认组"
             */
            $fanRepository = new FanRepository();
            $fanRepository->moveFanGroupByGroupid($model->account_id, $model->group_id, 0);
            /*
             * 2.2) 软删除这个组
             */
            return $model->delete();
        }
    }


    /**
     * update.
     *
     * @param Int   $accountId Account ID
     * @param Int   $addId     加粉丝的组自增ID
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
     * save.
     *
     * @param object $fanGroup
     * @param array  $input    Request
     */
    private function _savePost($fanGroup, $input)
    {
        return $fanGroup->fill($input)->save();
    }
}
