<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FanGroup extends Model
{
    use SoftDeletes;

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'group_id',
        'account_id',
        'title',
        'fan_count',
        'is_default',
                          ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'group_id' => '粉丝组ID',
        'account_id' => '公众号ID',
        'title' => '组名称',
        'fan_count' => '粉丝数',
        'is_default' => '是否为系统默认组',
                         ];
}
