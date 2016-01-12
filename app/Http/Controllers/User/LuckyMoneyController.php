<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Overtrue\WeChat\Application;

class LuckyMoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
                'cert_path' => '‪D:\EXIKECERT\apiclient_cert.pem',
                'key_path' => '‪D:\EXIKECERT\apiclient_key.pem',
                // 'device_info'     => '013467007045764',
                // 'sub_app_id'      => '',
                // 'sub_merchant_id' => '',
                // ...
            ],

        ];

        $app = new Application($options);

        $luckyMoney = $app['luckymoney'];


        $data['mch_billno'] = '133134546546';
        $data['send_name'] = '测试';
        $data['re_openid'] = '133134546546';
        $data['total_amount'] = '1000';
        $data['total_num'] = 1;
        $data['wishing'] = 'wishing';
        $data['client_ip'] = '192.168.0.245';
        $data['act_name'] = 'test act';
        $data['remark'] = 'remark';

        $res = $luckyMoney->query('12345678912');

        dump($res);
//
//        $info=$user->get('oUmDhsoSkMpwajftc_eD-K8WbSYM');

//        dd($info);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
