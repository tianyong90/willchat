<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * 自定义菜单模型.
 */
class Menu extends Model
{
    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'parent_id',
        'name',
        'type',
        'key',
        'url',
        'media_id',
        'sort',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id' => '所属公众号',
        'parent_id'  => '上级菜单',
        'name'       => '菜单名称',
        'type'       => '菜单类型',
        'key'        => '菜单值',
        'url'        => '链接',
        'sort'       => '排序',
    ];

    /**
     * 子菜单关联.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subButtons()
    {
        return $this->hasMany(\App\Menu::class, 'parent_id', 'id');
    }
}
