<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DocumentController extends Controller
{
    /**
     * 文章列表
     *
     * @return mixed
     */
    public function index()
    {

        return user_view('docment.index');
    }

    /**
     * 文章详情
     *
     * @param $id
     *
     * @return mixed
     */
    public function detail($id)
    {

        return user_view('docment.detail');
    }
}
