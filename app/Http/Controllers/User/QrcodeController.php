<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

use EasyWeChat\Foundation\Application;

class QrcodeController extends Controller
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
//        $menu = $app->qrcode;

//        $menuList = $menu->current();


        return user_view('qrcode.create');
    }

    /**
     * 保存创建菜单
     *
     * @param Request $request
     */
    public function postCreate(Request $request)
    {
        $data = $request->all();


//        DB::table('qrcodes')->insert();

        return error('删除失败');
    }

    /**
     * 删除二维码
     *
     * @param $ids
     */
    public function destroy($ids = null)
    {

//        DB::table('qrcodes')->delete($ids);
        return success('删除成功！');
    }

    /**
     * 下载二维码
     *
     * @param int $id
     */
    public function download($id)
    {

        return response()->download(asset('images/user/logo.png'), 'pic.png', ['Content-Type' => 'image/png']);
    }

}
