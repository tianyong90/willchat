<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class DefaultReplyController extends Controller
{
    public function __construct()
    {

    }

    public function show()
    {
        return user_view('reply.default');
    }

    public function store(Request $request)
    {

    }
}
