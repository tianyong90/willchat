<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
        'sort' => '排序',
    ];

    /**
     * 子菜单关联
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function subButtons()
    {
        return $this->hasMany('App\Models\Menu', 'parent_id');
    }

    public function getTypeAttribute($type)
    {
        $typeMap = [
            'click' => '点击',
            'view' => '页面跳转',
            'scancode_push' => '扫码推事件',
            'scancode_waitmsg' => '扫码待提示',
            'pic_sysphoto' => '系统拍照发图',
            'pic_photo_or_album' => '拍照或相册发图',
            'pic_weixin' => '微信相册发图',
            'location_select' => '发送位置',
            'media_id' => '图片',
            'view_limited' => '图文消息',
        ];

        return $typeMap[$type];
    }
}
