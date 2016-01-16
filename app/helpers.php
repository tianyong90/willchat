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
