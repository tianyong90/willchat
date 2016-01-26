<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use EasyWeChat\Foundation\Application;

class FansController extends Controller
{
    public function index()
    {
        $options = get_wechat_options();

        $app = new Application($options);

        $user = $app['user'];
        $fansList = $user->lists();




        // 粉丝 openid 列表
        $openIds = $fansList->get('data.openid');


        return user_view('fans.index');
    }

    /**
     * 从微信官方服务器摘取粉丝数据并保存到本地数据库
     */
    public function updateFansData()
    {
        //TODO:update fans data

        
    }

    public function moveUser()
    {

    }

    public function editRemark()
    {

    }

}
