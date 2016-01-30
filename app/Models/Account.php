<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use SoftDeletes;

    //完成图片同步
    const SYNC_STATUS_FINSHED_IMAGE = 1;
    //完成图文同步
    const SYNC_STATUS_FINSHED_NEWS = 2;
    //完成视频同步
    const SYNC_STATUS_FINSHED_VIDEO = 3;
    //完成声音同步
    const SYNC_STATUS_FINSHED_VOICE = 4;
    //完成菜单同步
    const SYNC_STATUS_FINSHED_MENU = 5;

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'original_id',
        'wechat_account',
        'app_id',
        'app_secret',
        'account_type',
                          ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'name' => '公众号名称',
        'original_id' => '原始ID',
        'wechat_account' => '微信账号',
        'app_id' => '应用ID',
        'app_secret' => '应用secret',
        'account_type' => '账户类型',
                             ];
}
