<?php

namespace App\Services;

use App\Services\Account as AccountService;
use App\Repositories\FanGroupRepository;

class FanGroup
{
    /**
     * @var AccountService
     */
    private $accountService;

    /**
     * @var FanGroupRepository
     */
    private $fanGroupReposifoty;

    /**
     * FanGroup constructor.
     *
     * @param Account            $accountService
     * @param FanGroupRepository $fanGroupRepository
     */
    public function __construct(AccountService $accountService, FanGroupRepository $fanGroupRepository)
    {
        $this->accountService = $accountService;

        $this->fanGroupReposifoty = $fanGroupRepository;
    }

    /**
     * 微信粉丝分组数据同步到本地数据库.
     */
    public function syncToLocal()
    {
        $easywechat = app('easywechat');

        $groupData = $easywechat->user_group->lists();

        $this->clearLocal();

        foreach ($groupData['groups'] as $key => $group) {
            $this->fanGroupReposifoty->create($this->formatFromWeChat($group));
        }
    }

    /**
     * 删除公众号对应的本地粉丝分组数据
     */
    public function clearLocal()
    {
        $this->fanGroupReposifoty->deleteAll();
    }

    /**
     * 获取粉丝分组列表
     *
     * @return mixed
     */
    public function getGroups()
    {
        $easywechat = app('easywechat');

        $grouups = $easywechat->user_group->lists();

        return $grouups;
    }

    /**
     * 创建用户组
     *
     * @param string $groupName
     *
     * @return mixed
     */
    public function create($groupName)
    {
        $easywechat = app('easywechat');

        $result = $easywechat->user_group->cteate($groupName);

        return $result;
    }

    /**
     * 删除用户组
     *
     * @param int $groupId
     *
     * @return mixed
     */
    public function delete($groupId)
    {
        $easywechat = app('easywechat');

        $result = $easywechat->user_group->delete($groupId);

        return $result;
    }

    /**
     * 修改用户组
     *
     * @param int    $groupId
     * @param string $groupId
     *
     * @return mixed
     */
    public function update($groupId, $groupName)
    {
        $easywechat = app('easywechat');

        $result = $easywechat->user_group->update($groupId, $groupName);

        // 更新本地数据库中信息
        $this->fanGroupReposifoty->updateGroup($groupId, $groupName);

        return $result;
    }

    public function getFanGroupByOpenid($openid)
    {
        $easywechat = app('easywechat');

        $result = $easywechat->user->group($openid);

        return $result;
    }

    /**
     * 从微信数据格式化.
     *
     * @param array $ganGroup
     *
     * @return array
     */
    public function formatFromWeChat($ganGroup)
    {
        return [
            'name' => $ganGroup['name'],
            'group_id' => $ganGroup['id'],
            'count' => $ganGroup['count'],
        ];
    }
}
