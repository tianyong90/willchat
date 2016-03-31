<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\PostRepository;

class DocumentController extends Controller
{
    /**
     * @var PostRepository
     */
    private $postRepository;

    /**
     * DocumentController constructor.
     *
     * @param PostRepository $postRepository
     */
    public function __construct(PostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    /**
     * 文章列表.
     *
     * @return mixed
     */
    public function index()
    {
        $articles = $this->postRepository->paginate();

        return user_view('docment.index', compact('articles'));
    }

    /**
     * 文章详情.
     *
     * @param $id
     *
     * @return mixed
     */
    public function detail($id)
    {
        $article = $this->postRepository->find($id);

        $prevId = $id > 1 ? $id - 1 : 1;
        $nextId = $id > 1 ? $id - 1 : 1;

        return user_view('docment.detail', compact('article', 'prevId', 'nextId'));
    }
}
