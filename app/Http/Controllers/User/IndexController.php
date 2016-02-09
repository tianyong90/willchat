<?php

namespace App\Http\Controllers\User;

use App\Models\Account;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account = new Account();

        $accounts = $account::all();

        return user_view('index.index', compact('accounts'));
    }
}
