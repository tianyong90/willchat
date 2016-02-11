<?php

namespace App\Http\Controllers\User;

use App\Repositories\QrcodeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use EasyWeChat\Foundation\Application;

class QrcodeController extends Controller
{
    /**
     * @var QrcodeRepository
     */
    private $qrcodeRepository;

    /**
     * QrcodeController constructor.
     *
     * @param QrcodeRepository $qrcodeRepository
     */
    public function __construct(QrcodeRepository $qrcodeRepository)
    {
        $this->qrcodeRepository = $qrcodeRepository;
    }

    public function index()
    {
        $qrcodes = $this->qrcodeRepository->lists(1);

        return user_view('qrcode.index', compact('qrcodes'));
    }

    /**
     * 显示创建表单.
     *
     * @return mixed
     */
    public function getCreate()
    {
        return user_view('qrcode.create');
    }

    /**
     * 创建二维码并保存.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postCreate(Request $request)
    {
//        $options = get_wechat_options();
//
//        $app = new Application($options);
//
//        $menu = $app->qrcode;

//        $menuList = $menu->current();

        $this->qrcodeRepository->store($request->all());

        return error('保存成功');
    }

    /**
     * 删除二维码
     *
     * @param $id
     */
    public function destroy($id)
    {
        $this->qrcodeRepository->destroy($id);

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
