<?php

namespace App\Http\Controllers\User;

use App\Events\PasswordUpdated;
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
        $user = Auth::user();

        $user->fill($request->all());
        $user->save();

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
        // 发送改密通知邮件
        event(new PasswordUpdated(auth()->user()));

        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|confirmed',
        ]);

        // 验证原密码
        if (Auth::attempt(array('name' => Auth::user()->name, 'password' => $request->old), true)) {
            // 修改密码
            $user = Auth::user();
            $user->password = bcrypt($request->password);
            $user->save();

            return success('修改成功');
        } else {
            return error('原密码错误');
        }
    }
}
