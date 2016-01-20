<?php

namespace App\Http\Controllers\User;

use App\Models\OfficialAccount;
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
        $data['newsCount'] = 100;
        $data['textCount'] = 100;
        $data['orderCount'] = 100;
        $data['memberCount'] = 100;

        $officialAccount = new OfficialAccount();

//        for ($i = 0; $i < 5; $i++) {
//            $officialAccount->name = str_random(5);
//            $officialAccount->token = str_random(5);
//            $officialAccount->appid = str_random(5);
//            $officialAccount->appsecret = str_random(5);
//            $officialAccount->encodingaeskey = str_random(5);
//            $officialAccount->type = 1;
//
//            $officialAccount->save();
//        }

        $accounts = $officialAccount::all();

        return user_view('index.index', compact('accounts', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
