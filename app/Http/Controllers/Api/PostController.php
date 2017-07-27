<?php

namespace App\Http\Controllers\Api;

use App\Repositories\PostRepository;
use Illuminate\Http\Request;

class PostController extends BaseController
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * PostController constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        parent::__construct();

        $this->postRepository = $postRepository;
    }

    /**
     * 文章列表.
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function lists(Request $request)
    {
        $posts = $this->postRepository->paginate();

        return response()->json(compact('posts'));
    }

    /**
     * 文章详情.
     *
     * @param $id
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        $post = $this->postRepository->find($id);

        return response()->json(compact('post'));
    }
}
