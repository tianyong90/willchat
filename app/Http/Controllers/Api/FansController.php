<?php

namespace App\Http\Controllers\Api;

use App\Jobs\SyncWechatFans;
use App\Repositories\FanRepository;
use Illuminate\Http\Request;

class FansController extends BaseController
{
    /**
     * @var FanRepository
     */
    private $fanRepository;

    /**
     * FansController constructor.
     *
     * @param FanRepository $fanRepository
     */
    public function __construct(FanRepository $fanRepository)
    {
        parent::__construct();

        $this->fanRepository = $fanRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $keyword = $request->input('keyword');
        $sex = $request->input('sex', 'all');

        $fans = $this->fanRepository->scopeQuery(function ($query) use ($keyword, $sex) {
            $query->where('account_id', $this->currentAccountId);

            if ($keyword) {
                $query->where('nickname', 'like', "%{$keyword}%");
            }

            if ($sex !== 'all') {
                $query->where('sex', $sex);
            }

            return $query;
        })->orderBy('updated_at', 'DESC')->orderBy('id', 'DESC')->paginate();

        return response()->json(compact('fans'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function syncFromWechatServer(Request $request)
    {
        $this->dispatch(new SyncWechatFans());

        return response('同步成功', 200);
    }
}
