<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class LuckyMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $options = get_wechat_options();

        $app = new Application($options);

        $luckyMoney = $app['lucky_money'];

        $data['mch_billno'] = '133134546546';
        $data['send_name'] = '测试';
        $data['re_openid'] = '133134546546';
        $data['total_amount'] = '1000';
        $data['total_num'] = 1;
        $data['wishing'] = 'wishing';
        $data['client_ip'] = '192.168.0.245';
        $data['act_name'] = 'test act';
        $data['remark'] = 'remark';
        $data['hb_type'] = 'NORMAL';

        $res = $luckyMoney->prepare($data);
//        $res = $luckyMoney->sendGroup($data);

        dump($res);
    }
}
