<?php

namespace App\Services;

use App\Fan as FanModel;
use App\Repositories\FanRepository;

class Fan
{
    /**
     * @var FanRepository
     */
    private $fanfanRepository;

    /**
     * Fan constructor.
     *
     * @param Fan $fanRepository
     */
    public function __construct(FanRepository $fanRepository)
    {
        $this->fanfanRepository = $fanRepository;
    }

    /**
     * 同步粉丝数据到本地数据库.
     */
    public function syncToLocal()
    {
        $easywechat = app('easywechat');

        $user = $easywechat->user;

        $nextOpenid = '';

        // 删除本地旧数据
        FanModel::where('account_id', '=', get_chosed_account())->delete();

        // 备忘：batchGet 批量获取粉丝信息时一次最多获取100个粉丝
        do {
            $fansList = $user->lists($nextOpenid, 100);

            if (empty($fansList['next_openid'])) {
                break;
            } else {
                $nextOpenid = $fansList['next_openid'];
            }

            if ($fansList['count'] > 0 && $fansList['count'] <= 100) {
                // 粉丝 openid 列表
                $openIds = $fansList->get('data.openid');

                $fanList = $user->batchGet($openIds)->get('user_info_list');

                $fans = array_map(function ($item) {
                    $item['account_id'] = get_chosed_account();
                    $item['created_at'] = date('Y-md H:i:s');
                    $item['updated_at'] = date('Y-md H:i:s');
                    $item['subscribe_time'] = date('Y-m-d H:i:s', $item['subscribe_time']);

                    return $item;
                }, $fanList);

                FanModel::insert($fans);
            } elseif ($fansList['count'] > 100) {
                // 粉丝 openid 列表
                $openIds = $fansList->get('data.openid');

                $openidsChunk = array_chunk($openIds, 100);

                foreach ($openidsChunk as $value) {
                    $fanList = $user->batchGet($value)->get('user_info_list');

                    $fans = array_map(function ($item) {
                        $item['account_id'] = get_chosed_account();
                        $item['created_at'] = date('Y-md H:i:s');
                        $item['updated_at'] = date('Y-md H:i:s');
                        $item['subscribe_time'] = date('Y-m-d H:i:s', $item['subscribe_time']);

                        return $item;
                    }, $fanList);

                    FanModel::insert($fans);
                }
            }
        } while ($fansList['count'] > 0 && $fansList['next_openid']);

        return success('同步成功');
    }

    /**
     * 从微信数据格式化.
     *
     * @param array $fan
     *
     * @return array
     */
    public function formatFromWeChat($fan)
    {
        return [
            'openid'         => $fan['openid'],
            'nickname'       => $fan['nickname'],               //昵称
            'sex'            => $fan['sex'],                         //性别
            'city'           => $fan['city'],                       //城市
            'country'        => $fan['country'],                 //国家
            'province'       => $fan['province'],               //省
            'language'       => $fan['language'],               //语言
            'headimgurl'     => $fan['headimgurl'],               //头像
            'subscribe_time' => date('Y-m-d H:i:s', $fan['subscribe_time']), //关注时间
            'unionid'        => array_get($fan, 'unionid'),      //unionid
            'remark'         => $fan['remark'],                   //备注
            'groupid'        => $fan['groupid'] ? $fan['groupid'] : 0, //组ID
            'updated_at'     => date('Y-m-d H:i:s'),
            'deleted_at'     => null,
            'subscribe'      => $fan['subscribe'],
            'account_id'     => $fan['account_id'],
        ];
    }

    /**
     * 修改备注.
     *
     * @param int    $id
     * @param string $remark
     */
    public function edirRemark($id, $remark)
    {
        $easywechat = app('easywechat');
        $user = $easywechat->user;

        $openId = $this->fanfanRepository->find($id)->openid;

        //更新备注
        $user->remark($openId, $remark);

        //更新本地库中对应备注数据
        $this->fanfanRepository->update(['remark' => $remark], $id);
    }

    /**
     * 移动粉丝到分组.
     *
     * @param $id
     * @param $groupId
     */
    public function moveTo($id, $groupId)
    {
        $easywechat = app('easywechat');
        $user = $easywechat->user_group;

        $openId = $this->fanfanRepository->find($id)->openid;

        //更新备注
        $user->moveUser($openId, $groupId);

        //更新本地库中对应备注数据
        $this->fanfanRepository->update(['groupid' => $groupId], $id);
    }

    /**
     * 添加新粉丝数据到本地.
     *
     * @param array $fan
     *
     * @return mixed
     */
    public function create(array $fan)
    {
        return $this->fanfanRepository->create($this->formatFromWeChat($fan));
    }

    /**
     * 根据ID删除.
     *
     * @param string $openId
     * @param int    $accountId
     *
     * @return int
     */
    public function deleteByOpenId($openId, $accountId)
    {
        return $this->fanfanRepository->deleteByOpenId($openId, $accountId);
    }
}
