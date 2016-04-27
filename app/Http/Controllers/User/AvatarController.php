<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepository;
use Auth;
use Illuminate\Http\Request;
use Image;

class AvatarController extends Controller
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * AvatarController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * 头像设置页面.
     *
     * @return mixed
     */
    public function index()
    {
        return user_view('profile.avatar');
    }

    /**
     * 上传、处理头像并保存.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avatarFile = $request->file('avatar_file');

        if ($avatarFile->isValid()) {
            $newName = 'uploads/avatar/' . Auth::user()->name . '.jpg';

            $cropWidth = $request->input('width');
            $cropHeight = $request->input('height');
            $cropX = $request->input('x');
            $cropY = $request->input('y');

            $rotateDegree = $request->input('rotate');

            try {
                Image::make($avatarFile)->rotate(-$rotateDegree)->crop($cropWidth, $cropHeight, $cropX, $cropY)->resize(200, 200)->save(public_path($newName));

                // 更新用户头像数据
                $this->userRepository->setAvatar($newName, Auth::user()->id);

                return success('头像设置成功');
            } catch (\Exception $e) {
                \Log::error($e->getMessage());

                return error('头像设置出错');
            }
        } else {
            return error('文件上传失败');
        }
    }
}
