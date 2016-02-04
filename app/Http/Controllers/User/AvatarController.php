<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Point;

class AvatarController extends Controller {
	public function index() {
		return user_view('profile.avatar');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request $request
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request) {
		$avatarFile = $request->file('avatar_file');

		if ($avatarFile->isValid()) {
			$clientName = $avatarFile->getClientOriginalName();
//            $tmpName = $file->getFileName();
			$realPath = $avatarFile->getRealPath();
//            $extension = $file->getClientOriginalExtension();
			//            $mimeTye = $file->getMimeType();
			$newName = 'uploads/avatar/' . md5(date('ymdhis') . $clientName) . ".jpg";

			$imagine = new Imagine();
			$point = new Point($request->input('x'), $request->input('y'));
			$cropSize = new Box($request->input('width'), $request->input('width'));

			$saveSize = new Box(200, 200); //最终保存尺寸
			$rotateDegree = $request->input('rotate');

			try {
				$imagine->open($realPath)->rotate($rotateDegree)->crop($point, $cropSize)->resize($saveSize)->save($newName);
				return Response::json(['atatus' => 1, 'info' => '头像设置成功']);
			} catch (\Exception $e) {
				return Response::json(['atatus' => 0, 'info' => '头像设置出错']);
			}
		} else {
			return Response::json(['atatus' => 0, 'info' => '文件上传失败']);
		}
	}
}
