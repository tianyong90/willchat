<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'fans_id',
        'resource_id',
        'reply_id',
        'content',
        'msg_id',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id' => '公众号ID',
        'fans_id' => '粉丝id',
        'resource_id' => '消息资源id',
        'reply_id' => '回复id',
        'content' => '内容',
        'msg_id' => '消息id',
    ];
}
