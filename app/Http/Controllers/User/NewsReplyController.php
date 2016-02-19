<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\ReplyRepository;

class NewsReplyController extends Controller
{
    /**
     * @var ReplyRepository
     */
    private $replyRepository;

    public function __construct(ReplyRepository $reply)
    {
        $this->replyRepository = $reply;
    }

    public function index()
    {
        $replies = $this->replyRepository->getList(\Session::get('account_id'), 10);

        return user_view('reply.newsreplylist', compact('replies'));
    }

    public function getCreate()
    {
        return user_view('reply.textreplyform');
    }

    public function postCreate(Request $request)
    {
        $this->replyRepository->store($request, \Session::get('account_id'));

        return success('保存成功');
    }

    public function getUpdate($id)
    {
        return user_view('reply.textreplyform');
    }

    public function postUpdate(Request $request)
    {
        $this->replyRepository->store($request, \Session::get('account_id'));

        return success('保存成功');
    }

    public function enable($ids)
    {
        return success('删除成功');
    }

    public function disable($ids)
    {
        return success('删除成功');
    }

    public function destroy($ids)
    {
        return success('删除成功');
    }
}
