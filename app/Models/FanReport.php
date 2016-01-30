<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FanReport extends Model
{
    use SoftDeletes;

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'openid',
        'type',
                          ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id' => '公众号ID',
        'openid' => 'OPENID',
        'type' => '操作类型',
                         ];
}
