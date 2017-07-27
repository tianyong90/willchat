<?php

namespace App;

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
        'token',
        'user_id',
        'app_id',
        'app_secret',
        'aes_key',
        'merchant_id',
        'merchant_key',
        'cert_path',
        'key_path',
        'type',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'name'           => '公众号名称',
        'original_id'    => '原始ID',
        'wechat_account' => '微信账号',
        'app_id'         => '应用ID',
        'app_secret'     => '应用secret',
        'aes_key'        => '应用secret',
        'merchant_id'    => '商户号',
        'key'            => '商户密钥',
        'cert_path'      => '商户证书路径',
        'key_path'       => '密钥证书路径',
        'type'           => '账户类型',
    ];

    /**
     * 重载 setAttrivute,保存时去除多余空格
     *
     * @param string $key
     * @param mixed  $value
     *
     * @return $this
     */
    public function setAttribute($key, $value)
    {
        $value = trim($value);

        return parent::setAttribute($key, $value);
    }

    /**
     * @param $type
     *
     * @return string
     */
    public function getTypeAttribute($type)
    {
        switch ($type) {
            case 1:
                return '订阅号';
            case 2:
                return '认证订阅号';
            case 3:
                return '服务号';
            case 4:
                return '认证服务号';
            default:
                return '未知类型';
        }
    }
}
