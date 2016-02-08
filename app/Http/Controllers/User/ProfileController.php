<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
USE Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * ProfileController constructor.
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public function getIndex()
    {
        $user = auth()->user();

        return user_view('profile.index', compact('user'));
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postIndex(Request $request)
    {

        return success('修改成功');
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return user_view('profile.password');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function postPassword(Request $request)
    {
        //TODO: 发送改密通知邮件

        $oldPassword = $request->input('old');

        // 验证原密码
        if (Auth::attempt(array('name' => Auth::user()->name, 'password' => $oldPassword), true)) {
            //TODO: 修改密码

            return success('修改成功');
        } else {
            return error('原密码错误');
        }
    }
}
