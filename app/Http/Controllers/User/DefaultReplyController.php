<?php

namespace app\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Reply;
use App\Repositories\ReplyRepository;
use Illuminate\Http\Request;

class DefaultReplyController extends Controller
{
    /**
     * @var ReplyRepository
     */
    private $replyRepository;

    /**
     * DefaultReplyController constructor.
     *
     * @param ReplyRepository $replyRepository
     */
    public function __construct(ReplyRepository $replyRepository)
    {
        $this->replyRepository = $replyRepository;
    }

    /**
     * 显示表单.
     *
     * @return mixed
     */
    public function show()
    {
        // 原默认回复数据
        $replyData = $this->replyRepository->getDefaultReply();

        return user_view('reply.default', compact('replyData'));
    }

    /**
     * 保存回复数据.
     *
     * @param Request $request
     */
    public function store(Request $request)
    {
        $input = $request->all();

        $reply = $this->replyRepository->getDefaultReply();

        if ($reply) {
            $this->replyRepository->update($input, $reply->id);
        } else {
            $input['type'] = Reply::TYPE_DEFAULT;

            $this->replyRepository->create($input);
        }

        return success('保存成功');
    }
}
