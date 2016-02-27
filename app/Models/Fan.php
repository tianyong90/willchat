<?php

namespace App\Models;

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
        'group_id',
        'openid',
        'nickname',
        'signature',
        'remark',
        'sex',
        'language',
        'city',
        'province',
        'country',
        'avatar',
        'unionid',
        'liveness',
        'subscribed_at',
        'last_online_at',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id' => '公众号ID',
        'group_id' => '粉丝组ID',
        'openid' => 'OPENID',
        'nickname' => '昵称',
        'signature' => '签名',
        'remark' => '备注',
        'sex' => '性别',
        'language' => '语言',
        'city' => '城市',
        'province' => '省份',
        'country' => '国家',
        'avatar' => '头像',
        'unionid' => 'unionid',
        'liveness' => '活跃度',
        'subscribed_at' => '关注时间',
        'last_online_at' => '最后上线时间',
    ];

    /**
     * 附加字段
     *
     * @var array
     */
    protected $appends = ['location'];

    /**
     * 返回性别
     *
     * @return string
     */
    public function getSexAttribute($sex)
    {
        return $sex == 1 ? '男' : '女';
    }

    /**
     * 返回位置信息
     *
     * @return string
     */
    public function getLocationAttribute()
    {
        return $this->country . ' ' . $this->province . ' ' . $this->city;
    }
}
