<?php

/**
 * helpers.php.
 *
 * 工具函数
 *
 * @author tianyong90 <412039588@qq.com>
 */
function user_url($uri)
{
    return url('user/'.$uri);
}

function user_view($name)
{
    $args = func_get_args();
    $args[0] = 'user.'.$name;

    return call_user_func_array('view', $args);
}

function admin_url($uri)
{
    return url('admin/'.$uri);
}

function admin_view($name)
{
    $args = func_get_args();
    $args[0] = 'admin.'.$name;

    return call_user_func_array('view', $args);
}

/**
 * 选择当前公众号.
 *
 * @param int $accountId
 */
function chose_account($accountId)
{
    app('willchat.account_service')->chose($accountId);
}

/**
 * 返回当前公众号.
 *
 * @return int
 */
function get_chosed_account()
{
    return app('willchat.account_service')->chosedId();
}

function make_api_url($tag)
{
    return url('/api?t='.$tag);
}

/**
 * 获取用户头像图片路径，未设置则返回默认头像路径.
 *
 * @param $userId
 *
 * @return bool|string
 */
function get_user_avatar($userId)
{
    $userRepository = app('App\Repositories\UserRepository');

    $avatar = $userRepository->getAvatar($userId);
    if ($avatar && file_exists(public_path($avatar))) {
        return asset($avatar);
    } else {
        return asset('images/user/defaultavatar.png');
    }
}

/**
 * 获取微信公众号配置参数.
 *
 * @param int $accountId
 *
 * @return array
 */
function get_wechat_options($accountId)
{
    return app('willchat.account_service')->getWechatOptions($accountId);
}

/**
 * 返回操作成功提示及跳转地址
 *
 * @param        $info
 * @param string $redirectUrl
 *
 * @return \Illuminate\Http\JsonResponse
 */
function success($info, $redirectUrl = '')
{
    return response()->json(['status' => 1, 'info' => $info, 'url' => $redirectUrl]);
}

/**
 * 返回操作失败提示及跳转地址
 *
 * @param        $info
 * @param string $redirectUrl
 *
 * @return \Illuminate\Http\JsonResponse
 */
function error($info, $redirectUrl = '')
{
    return response()->json(['status' => 0, 'info' => $info, 'url' => $redirectUrl]);
}

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

function input()
{
    return call_user_func_array('Request::get', func_get_args());
}

/**
 * CSS 资源路径.
 *
 * @param $path
 *
 * @return string
 */
function css($path)
{
    return static_file("css/$path");
}

/**
 * JS 资源路径.
 *
 * @param $path
 *
 * @return string
 */
function js($path)
{
    return static_file("js/$path");
}

/**
 * images 路径.
 *
 * @param $path
 *
 * @return string
 */
function img($path)
{
    return static_file("img/$path");
}

/**
 * vendors 路径.
 *
 * @param $path
 *
 * @return string
 */
function vendor($path)
{
    return static_file("vendor/$path");
}

function image($path, $sizeName = '')
{
    if ($sizeName) {
        $parts = explode('.', $path);

        $path = $parts[0].'-'.$sizeName.'.'.$parts[1];
    }

    return static_file($path);
}

function static_file($path)
{
    $path = str_replace('//', '/', $path);

    return asset("$path");
}

/**
 * 记录调试日志.
 *
 * @param mixed $content
 */
function debuglog($content)
{
    \Log::debug($content);
}
