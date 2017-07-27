<?php

namespace App\Http\Controllers\Api;

use App\Reply;
use App\Repositories\ReplyRepository;
use Illuminate\Http\Request;

class ReplyController extends BaseController
{
    /**
     * @var ReplyRepository;
     */
    private $replyRepository;

    /**
     * ReplyController constructor.
     *
     * @param ReplyRepository $replyRepository
     */
    public function __construct(ReplyRepository $replyRepository)
    {
        parent::__construct();

        $this->replyRepository = $replyRepository;
    }

    /**
     * 回复规则列表.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $keyword = $request->input('keyword');
        $type = $request->input('type', 'text');

        $replies = $this->replyRepository->scopeQuery(function ($query) use ($keyword, $type) {
            $query->where('account_id', $this->currentAccountId);

            if ($keyword) {
                $query->where('nickname', 'like', "%{$keyword}%");
            }

            $query->where('trigger_type', 'keywords');

            return $query;
        })->orderBy('updated_at', 'DESC')->orderBy('id', 'DESC')->paginate();

        return response()->json(compact('replies'));
    }

    /**
     * 默认回复.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getDefaultReply()
    {
        $reply = $this->replyRepository->getDefaultReply($this->currentAccountId);

        return response()->json(compact('reply'));
    }

    /**
     * 用户关注回复.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getSubscribeReply()
    {
        $reply = $this->replyRepository->getSubscribeReply($this->currentAccountId);

        return response()->json(compact('reply'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        try {
            $data = $request->all();
            $data['account_id'] = $this->currentAccountId;

            $this->replyRepository->updateOrCreate(['id' => $data['id']], $data);

            return response('保存成功');
        } catch (\Exception $e) {
            return response('保存失败', 500);
        }
    }

    /**
     * 删除
     *
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function delete(Request $request)
    {
        $id = $request->input('id');

        try {
            $this->replyRepository->delete($id);

            return response('删除成功');
        } catch (\Exception $e) {
            return response($e->getMessage(), 500);
        }
    }
}
