<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class LockController extends Controller
{
    public function index()
    {
        return user_view('public.lock');
    }
}
