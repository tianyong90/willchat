<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function index()
    {
                $email = '412039588@qq.com';
        $name = 'tianyong';
        $uid = 123;
        $code = 'abc';

        $data = ['email' => $email, 'name' => $name, 'uid' => $uid, 'activationcode' => $code];
        Mail::send('welcome', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject("abadafsl哈哈");
        });

        return user_view('docment.index');
    }


}
