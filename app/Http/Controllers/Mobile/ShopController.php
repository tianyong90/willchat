<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;
use EasyWeChat\Core\AccessToken;
use EasyWeChat\Js\Js;
use EasyWeChat\Payment\Merchant;
use EasyWeChat\Payment\Order;
use EasyWeChat\Payment\Payment;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getIndex()
    {
        return view('mobile.vux');

        $openAuth = app('openauth');

        $authorizerAccessToken = $openAuth->refreshAuthorizerAccessToken('wx8512898f03f0c3a6', 'refreshtoken@@@z6bDHF5ao06Pc4bmC7-6viR7aFoa8Oxse9T9S_FPlnc');

        dd($authorizerAccessToken);

        app('willchat.account_service')->chose(1);

        $easywechat = app('easywechat');

        $js = $easywechat->js;

        $jsApiList = [
            'onMenuShareTimeline',
            'onMenuShareAppMessage',
            'onMenuShareQQ',
            'onMenuShareWeibo',
            'onMenuShareQZone',
            'startRecord',
            'stopRecord',
            'onVoiceRecordEnd',
            'playVoice',
            'pauseVoice',
            'stopVoice',
            'onVoicePlayEnd',
            'uploadVoice',
            'downloadVoice',
            'chooseImage',
            'previewImage',
            'uploadImage',
            'downloadImage',
            'translateVoice',
            'getNetworkType',
            'openLocation',
            'getLocation',
            'hideOptionMenu',
            'showOptionMenu',
            'hideMenuItems',
            'showMenuItems',
            'hideAllNonBaseMenuItem',
            'showAllNonBaseMenuItem',
            'closeWindow',
            'scanQRCode',
            'chooseWXPay',
            'openProductSpecificView',
            'addCard',
            'chooseCard',
            'openCard',
        ];

        $jsConfig = $js->config($jsApiList, true, false);

        // 商户参数
        $merchant = new Merchant([
            'app_id' => env('WECHAT_APPID'),
            'merchant_id' => env('WECHAT_MERCHANT_ID'),
            'key' => env('WECHAT_MERCHANT_KEY'),
            'ssl_cert_path' => env('CERT_PATH'),
            'ssl_key_path' => env('KEY_PATH'),
        ]);

        // 订单数据
        $order = new Order([
            'body' => 'iPad mini 16G 白色',
            'detail' => 'iPad mini 16G 白色',
            'out_trade_no' => '1217752501201407033233368018',
            'total_fee' => 1,
            'trade_type' => 'JSAPI',
            'openid' => 'oYqIis0q3n7uRembQy1VgK7_tyrE',
            'notify_url' => 'http://bontian.oicp.net/order-notify', // 支付结果通知网址，如果不设置则会使用配置里的默认地址
            // ...
        ]);
        $payment = new Payment($merchant);


        // 统一下单
        $result = $payment->prepare($order);

        $prepayId = $result->prepay_id;


        $paymentJsConfig = $payment->configForPayment($prepayId, false);

//        dd($paymentJsConfig);

        return view('mobile.index', compact('jsConfig', 'paymentJsConfig'));
    }
}
