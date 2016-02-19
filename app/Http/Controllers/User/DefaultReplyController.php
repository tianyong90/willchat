<?php

namespace app\Http\Controllers\User;

use App\Models\Reply;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ReplyRepository;

class DefaultReplyController extends Controller
{
    /**
     * @var ReplyRepository
     */
    private $replyRepository;

    public function __construct(ReplyRepository $reply)
    {
        $this->replyRepository = $reply;
    }

    /**
     * 显示默认回复设置数据.
     *
     * @return mixed
     */
    public function show()
    {
        // 原默认回复数据
        $replyData = $this->replyRepository->getDefaultReply(get_chosed_account());

        return user_view('reply.default', compact('replyData'));
    }

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        $this->replyRepository->store($request, get_chosed_account(),  Reply::TYPE_DEFAULT);

        return success('保存成功');
    }
}
