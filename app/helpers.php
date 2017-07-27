<?php

/**
 * helpers.php.
 *
 * 工具函数
 *
 * @author tianyong90 <412039588@qq.com>
 */

/**
 * 获取自定义菜单类型列表.
 *
 * @return array
 */
function getMenuTypes()
{
    $typeMap = [
        'click'              => '点击',
        'view'               => '页面跳转',
        'scancode_push'      => '扫码推事件',
        'scancode_waitmsg'   => '扫码待提示',
        'pic_sysphoto'       => '系统拍照发图',
        'pic_photo_or_album' => '拍照或相册发图',
        'pic_weixin'         => '微信相册发图',
        'location_select'    => '发送位置',
        'media_id'           => '图片',
        'view_limited'       => '图文消息',
    ];

    return $typeMap;
}
