<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Fan extends Model
{
    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'groupid',
        'openid',
        'nickname',
        'remark',
        'sex',
        'language',
        'city',
        'province',
        'country',
        'headimgurl',
        'unionid',
        'liveness',
        'subscribe',
        'subscribe_time',
        'last_online_at',
        'subscribe',
        'tagid_list',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id'     => '公众号ID',
        'groupid'        => '粉丝组ID',
        'openid'         => 'OPENID',
        'nickname'       => '昵称',
        'remark'         => '备注',
        'sex'            => '性别',
        'language'       => '语言',
        'city'           => '城市',
        'province'       => '省份',
        'country'        => '国家',
        'headimgurl'     => '头像',
        'unionid'        => 'unionid',
        'liveness'       => '活跃度',
        'subscribe_time' => '关注时间',
        'last_online_at' => '最后上线时间',
        'tagid_list'     => '标签ID',
    ];

    /**
     * 附加字段.
     *
     * @var array
     */
    protected $appends = ['location'];

    protected $casts = [
        'tagid_list' => 'array',
    ];

    /**
     * 返回性别.
     *
     * @return string
     */
    public function getSexAttribute($sex)
    {
        return $sex == 1 ? '男' : '女';
    }

    /**
     * 返回位置信息.
     *
     * @return string
     */
    public function getLocationAttribute()
    {
        return $this->country.' '.$this->province.' '.$this->city;
    }

    public function setSubscribeTimeAttribute($value)
    {
        $this->attributes['subscribe_time'] = Carbon::createFromTimestamp($value);
    }
}
