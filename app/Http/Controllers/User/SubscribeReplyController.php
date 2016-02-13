<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Repositories\ReplyRepository;

class SubscribeReplyController extends Controller
{
    /**
     * @var ReplyRepository
     */
    private $replyRepository;

    public function __construct(ReplyRepository $reply)
    {
        $this->replyRepository = $reply;
    }

    public function show()
    {
        $replyInfo = $this->replyRepository->getSubscribeReply(\Session::get('account_id'));

        return user_view('reply.subscribe', compact('replyInfo'));
    }

    public function store(Request $request)
    {
        $this->replyRepository->store($request, \Session::get('account_id'));

        return success('保存成功');
    }
}
