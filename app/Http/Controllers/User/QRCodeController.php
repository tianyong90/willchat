<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use EasyWeChat\Foundation\Application;

class QRCodeController extends Controller
{
    public function index()
    {
        $qrcodeList = DB::table('qrcodes')->paginate(15);

        return user_view('qrcode.index', ['qrcodes' => $qrcodeList]);
    }

    /**
     * 创建菜单
     */
    public function getCreate()
    {
        $options = get_wechat_options();
//
//        $app = new Application($options);
//
//        $menu = $app['menu'];

//        $menuList = $menu->current();

//        dump($menuList);
//        exit;



        return user_view('qrcode.create');
    }

    /**
     * 保存创建菜单
     */
    public function postCreate()
    {
        //TODO:update fans data


    }

    /**
     * 删除二维码
     *
     * @param Request $request
     */
    public function destroy(Request $request)
    {
        $ids = $request->route('ids');

        DB::table('qrcodes')->delete($ids);
        return Response::json(['status' => 1, 'info' => '删除成功']);

    }

}
