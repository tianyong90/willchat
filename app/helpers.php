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
 * 返回当前公众号.
 *
 * @return mixed
 */
function account()
{
    return app('viease.account_service');
}

function make_api_url($tag)
{
    return url('/api?t='.$tag);
}

/**
 * 获取微信公众号配置参数
 *
 * @param int $id
 * @param int $type
 *
 * @return array
 */
function get_wechat_options($id = 1, $type = 1)
{
    $options = [
        'debug' => true,
        'app_id' => env('WECHAT_APPID'),
        'secret' => env('WECHAT_APPSECRET'),
        'token' => env('WECHAT_TOKEN'),
        // log
        'log' => [
            'level' => \Monolog\Logger::DEBUG,
            'file' => storage_path('logs\easywechat.log'),
        ],
        // oauth
        'oauth' => [
            'scopes' => ['snsapi_userinfo'],
            'callback' => '/examples/oauth_callback.php',
        ],
        'payment' => [
            'merchant_id' => env('WECHAT_MERCHANT_ID'),
            'key' => env('WECHAT_MERCHANT_KEY'),
            'cert_path' => env('CERT_PATH'),
            'key_path' => env('KEY_PATH'),
        ],
    ];

    return $options;
}
