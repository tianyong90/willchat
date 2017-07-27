<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Qrcode extends Model
{
    use SoftDeletes;

    /**
     * 字段白名单.
     *
     * @var array
     */
    protected $fillable = [
        'account_id',
        'keyword',
        'remark',
        'type',
        'ticket',
    ];

    /**
     * 用于表单验证时的字段名称提示.
     *
     * @var array
     */
    public static $aliases = [
        'account_id' => '所属公众号',
        'keyword'    => '二维码参数',
        'remark'     => '备注',
        'type'       => '二维码类型',
        'ticket'     => '二维码 TICKET',
        'expire'     => '有效期',
    ];
}
