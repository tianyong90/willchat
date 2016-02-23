<?php

namespace App\Services;

use App\Repositories\FanRepository;
use App\Models\Fan as FanModel;

class Fan
{
    /**
     * @var FanRepository
     */
    private $fanRepository;

    /**
     * Fan constructor.
     *
     * @param FanRepository $fanRepository
     */
    public function __construct(FanRepository $fanRepository)
    {
        $this->fanRepository = $fanRepository;
    }

    /**
     * 同步粉丝数据到本地数据库
     */
    public function syncToLocal()
    {
        $easywechat = app('easywechat');

        $user = $easywechat->user;
        $fansList = $user->lists();

        // 粉丝 openid 列表
        $openIds = $fansList->get('data.openid');

        $fanList = $user->batchGet($openIds)->get('user_info_list');

        $fans = array_map(function ($item) {
            $item['account_id'] = 1;
            $item['created_at'] = \Carbon\Carbon::create();
            $item['updated_at'] = \Carbon\Carbon::create();
            $item['subscribe_time'] = \Carbon\Carbon::createFromTimestamp($item['subscribe_time']);
            return $item;
        }, $fanList);

        FanModel::insert($fans);
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
            'openid' => $fan['openid'],
            'nickname' => $fan['nickname'],               //昵称
            'sex' => $fan['sex'] ? '男' : '女',                         //性别
            'city' => $fan['city'],                       //城市
            'country' => $fan['country'],                 //国家
            'province' => $fan['province'],               //省
            'language' => $fan['language'],               //语言
            'avatar' => $fan['headimgurl'],               //头像
            'subscribed_at' => date('Y-m-d H:i:s', $fan['subscribe_time']), //关注时间
            'unionid' => array_get($fan, 'unionid'),                 //unionid
            'remark' => $fan['remark'],                   //备注
            'group_id' => $fan['groupid'] ? $fan['groupid'] : 0, //组ID
            'updated_at' => date('Y-m-d H:i:s'),
            'deleted_at' => null,
        ];
    }
}
