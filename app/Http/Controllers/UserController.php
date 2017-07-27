<?php

namespace App\Http\Controllers;

class UserController extends Controller
{
    /**
     * 公众号管理中心入口.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('user.index');
    }
}
