<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;
use App\Repositories\UserRepository;
use Auth;

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


    public function index()
    {
        return user_view('profile.avatar');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $avatarFile = $request->file('avatar_file');

        if ($avatarFile->isValid()) {
            $realPath = $avatarFile->getRealPath();
            $newName = 'uploads/avatar/' . Auth::user()->name . '.jpg';

            $imagine = new Imagine();
            $point = new Point($request->input('x'), $request->input('y'));
            $cropSize = new Box($request->input('width'), $request->input('width'));
            $saveSize = new Box(200, 200); //最终保存尺寸
            $rotateDegree = $request->input('rotate');

            try {
                $imagine->open($realPath)->rotate($rotateDegree)->crop($point, $cropSize)->resize($saveSize)->save(public_path($newName));

                // 更新用户头像数据
                $this->userRepository->setAvatar($newName, Auth::user()->id);

                return success('头像设置成功');
            } catch (\Exception $e) {
                \Log::info($e->getMessage());

                return error('头像设置出错');
            }
        } else {
            return error('文件上传失败');
        }
    }
}
