<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DocumentController extends Controller
{
    /**
     * 文章列表.
     *
     * @return mixed
     */
    public function index()
    {
        $articles = Article::paginate(10);

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
        $article = Article::find($id);

        $prevId = $id > 1 ? $id - 1 : 1;
        $nextId = $id > 1 ? $id - 1 : 1;

        return user_view('docment.detail', compact('article', 'prevId', 'nextId'));
    }
}
