<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\QrcodeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Storage;

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
        $easywechat = app('easywechat');

        $qrcodeService = $easywechat->qrcode;

        $qrcodes = $this->qrcodeRepository->listByType($type);

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
        $easywechat = app('easywechat');
        $qrcodeService = $easywechat->qrcode;

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

        $this->qrcodeRepository->create($qrcodeData);

        return error('保存成功', user_url('qrcode/'.$request->input('type')));
    }

    /**
     * 删除二维码
     *
     * @param $id
     */
    public function destroy($id)
    {
        $this->qrcodeRepository->delete($id);

        return success('删除成功！');
    }

    /**
     * 下载二维码
     *
     * @param int $id
     */
    public function download($id)
    {
        // 二维码相关数据
        $qrcodeData = $this->qrcodeRepository->find($id);

        $easywechat = app('easywechat');
        $qrcodeService = $easywechat->qrcode;

        $url = $qrcodeService->url($qrcodeData->ticket);
        // 获取二维码内容
        $content = file_get_contents($url);

        // 临时文件名
        $tempFilename = md5(time().uniqid('qr_'));

        // 二维码内容保存为临时图片
        Storage::put("temp/{$tempFilename}.png", $content);

        $file = storage_path("/app/temp/{$tempFilename}.png");

        // 返回下载响应
        return response()->download($file, $qrcodeData->remark.'.png', ['Content-Type' => 'image/png']);
    }
}
