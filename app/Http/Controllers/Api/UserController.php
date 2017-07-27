<?php

namespace App\Http\Controllers\Api;

use App\Repositories\UserRepository;
use App\User;
use Auth;
use Illuminate\Http\Request;
use Image;

class UserController extends BaseController
{
    /**
     * @var UserRepository
     */
    private $userRepository;

    /**
     * UserController constructor.
     *
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        parent::__construct();

        $this->userRepository = $userRepository;
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function updateUser(Request $request)
    {
        $data = $request->only(['nickname', 'qq', 'mobile']);

        $user = $this->userRepository->update($data, Auth::id());

        return response()->json(compact('user'));
    }

    /**
     * 设置头像.
     *
     * @param Request $request
     */
    public function uploadAvatar(Request $request)
    {
        if (!$user = Auth::user()) {
            return response('Unauthorized.', 401);
        }

//        $data = $request->all();

        $file = $request->file('avatar');

        if ($file->isValid()) {
            $avatarUrl = "/uploads/avatar/avatar-{$user->id}.jpg";

            // TODO: 头像裁剪上传
            // Image::make($file)->resize($data['width'], $data['height'])->crop($data['cropWidth'], $data['cropHeight'], $data['cropX'], $data['cropY'])->save(public_path($avatarUrl));
            Image::make($file)->save(public_path($avatarUrl));

            $user = $this->userRepository->update(['avatar' => $avatarUrl], $user->id);

            $token = \JWTAuth::refresh(true);

            return response()->json(['status' => 1, 'info' => '保存成功', 'token' => $token, 'user' => $user]);
        } else {
            $token = \JWTAuth::refresh(true);

            return response()->json(['status' => 0, 'info' => '文件无效', 'token' => $token]);
        }
    }
}
