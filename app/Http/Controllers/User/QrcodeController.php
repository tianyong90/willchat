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
    const TYPE_FOREVER = 'forever';
    const TYPE_TEMPORARY = 'temporary';

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

    /**
     * 二维码列表.
     *
     * @param $type
     *
     * @return mixed
     */
    public function index($type)
    {
        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);

        $qrcodeService = $app->qrcode;

        $qrcodes = $this->qrcodeRepository->listByType(\Session::get('account_id'), $type);

        return user_view('qrcode.index', compact('qrcodes', 'qrcodeService'));
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
        $options = get_wechat_options(\Session::get('account_id'));

        $app = new Application($options);

        $qrcodeService = $app->qrcode;

        if ($request->type = self::TYPE_FOREVER) {
            try {
                $result = $qrcodeService->forever($request->keyword);

            } catch (\Exception $e) {
                return error('创建失败');
            }
        } elseif ($request->type = self::TYPE_TEMPORARY) {
            try {
                $result = $qrcodeService->temporary($request->keyword, $request->expire);
            } catch (\Exception $e) {
                return error('创建失败');
            }
        }

        $qrcodeData = array_merge($request->all(), ['ticket' => $result->ticket]);

        $this->qrcodeRepository->store($qrcodeData);

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
