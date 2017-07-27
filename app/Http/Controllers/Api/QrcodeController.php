<?php

namespace App\Http\Controllers\Api;

use App\Repositories\QrcodeRepository;
use Illuminate\Http\Request;
use Storage;

class QrcodeController extends BaseController
{
    const TYPE_FOREVER = 'forever';
    const TYPE_TEMPORARY = 'temporary';

    /**
     * @var QrcodeRepository;
     */
    private $qrcodeRepository;

    /**
     * QrcodeController constructor.
     *
     * @param QrcodeRepository $qrcodeRepository
     */
    public function __construct(QrcodeRepository $qrcodeRepository)
    {
        parent::__construct();

        $this->qrcodeRepository = $qrcodeRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $keyword = $request->input('keyword');
        $type = $request->input('type', 'all');

        $qrcodes = $this->qrcodeRepository->scopeQuery(function ($query) use ($keyword, $type) {
            $query->where('account_id', $this->currentAccountId);

            if ($keyword) {
                $query->where('remard', 'like', "%{$keyword}%");
            }

            if ($type !== 'all') {
                $query->where('type', $type);
            }

            return $query;
        })->orderBy('updated_at', 'DESC')->orderBy('id', 'DESC')->paginate();

        return response()->json(compact('qrcodes'));
    }

    /**
     * 创建二维码
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function create(Request $request)
    {
        $data = $request->all();

        $qrcodeService = app('easywechat')->qrcode;

        if ($data['type'] === self::TYPE_FOREVER) {
            try {
                $result = $qrcodeService->forever($data['keyword']);
            } catch (\Exception $e) {
                return response('创建失败', 500);
            }
        } elseif ($data['type'] === self::TYPE_TEMPORARY) {
            try {
                $result = $qrcodeService->temporary($data['keyword'], $data['expir']);
            } catch (\Exception $e) {
                return response('创建失败', 500);
            }
        }

        $qrcode = array_merge($data, ['ticket' => $result->ticket, 'account_id' => $this->currentAccountId]);
        $this->qrcodeRepository->create($qrcode);

        return response('创建成功'. 200);
    }

    /**
     * 删除本地二维码记录.
     *
     * @param int $id
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function delete($id)
    {
        $qrcode = $this->qrcodeRepository->find($id);

        if (!$qrcode) {
            return response('对应二维码不存在', 404);
        }

        if ($qrcode->account_id !== $this->currentAccountId) {
            return response('二维码不属于当前公众号', 500);
        }

        $this->qrcodeRepository->delete($id);

        return response('删除成功', 200);
    }

    /**
     * 下载二维码
     *
     * @param $id
     *
     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
     */
    public function download($id)
    {
        // 二维码相关数据
        $qrcode = $this->qrcodeRepository->find($id);

        $easywechat = app('easywechat');
        $qrcodeService = $easywechat->qrcode;
        $url = $qrcodeService->url($qrcode->ticket);

        // 获取二维码内容
        $content = file_get_contents($url);

        // 临时文件名
        $tempFilename = md5(time().uniqid('qr_'));
        // 二维码内容保存为临时图片
        Storage::put("temp/{$tempFilename}.png", $content);

        $file = storage_path("/app/temp/{$tempFilename}.png");

        // 返回下载响应
        return response()->download($file, $qrcode->remark.'.png', ['Content-Type' => 'image/png']);
    }
}
