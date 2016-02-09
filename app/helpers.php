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
    return url('user/' . $uri);
}

function user_view($name)
{
    $args = func_get_args();
    $args[0] = 'user.' . $name;

    return call_user_func_array('view', $args);
}

function admin_url($uri)
{
    return url('admin/' . $uri);
}

function admin_view($name)
{
    $args = func_get_args();
    $args[0] = 'admin.' . $name;

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
    return url('/api?t=' . $tag);
}

/**
 * 获取微信公众号配置参数
 *
 * @param int  $accountId
 * @param bool $byToken
 *
 * @return array
 */
function get_wechat_options($accountId = 1, $byToken = false)
{
    $accountData = \App\Models\Account::find($accountId);

    $options = [
        'debug' => true,
        'app_id' => $accountData->app_id,
        'secret' => $accountData->app_secret,
        'token' => $accountData->token,
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
            'merchant_id' => $accountData->merchant_id,
            'key' => $accountData->key,
            'cert_path' => $accountData->cert_path,
            'key_path' => $accountData->key_path,
        ],
    ];

    return $options;
}

function success($info, $redirectUrl = '')
{
    return response()->json(['status' => 1, 'info' => $info, 'url' => $redirectUrl]);
}

function error($info, $redirectUrl = '')
{
    return response()->json(['status' => 0, 'info' => $info, 'url' => $redirectUrl]);
}
