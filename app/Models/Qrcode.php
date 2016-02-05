<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'name',
        'type',
        'key',
        'sort',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id' => '所属公众号',
        'parent_id' => '上级菜单',
        'name' => '菜单名称',
        'type' => '菜单类型',
        'key' => '菜单值',
        'sort' => '值',
    ];
}
