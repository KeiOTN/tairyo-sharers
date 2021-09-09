<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function info($user_id)
    {
        // お知らせ画面
        $user_get_query = User::select('*');
        $user_data = $user_get_query->find($user_id)->toArray();

        return view('users.info', [
            'user_data' => $user_data,
        ]);
    }

    public function mypage($user_id)
    {
        // マイページ
        $user_get_query = User::select('*');
        $user_data = $user_get_query->find($user_id)->toArray();

        return view('users.mypage', [
            'user_data' => $user_data,
        ]);
    }

    public function myprofile($user_id)
    {
        $user_get_query = User::select('*');
        $user_data = $user_get_query->find($user_id)->toArray();

        // echo '<pre>';
        // var_dump($user_data);
        // echo '<pre>';
        // exit;


        return view('users.myprofile', [
            'user_data' => $user_data,
        ]);
    }

    public function myprofile_edit($user_id)
    {
        $user_get_query = User::select('*');
        $user_data = $user_get_query->find($user_id)->toArray();


        return view('users.myprofile_edit', [
            'user_data' => $user_data,
        ]);
    }


    // public function edit($user_id)
    // {
    //     $user_get_query = User::select('*');
    //     $item = $user_get_query->find($user_id);

    //     return view('users.edit', [
    //         'item' => $item,
    //     ]);
    // }

    // public function update(Request $request)
    // {
    //     $content_get_query = Content::select('*');
    //     $content_info = $content_get_query->find($request['id']);

    //     // echo $request;
    //     // exit;

    //     $content_info->content = $request['content'];
    //     $content_info->save();
    //     return redirect(route('output'));


    //     $title = $request->input('title');
    //     $place_1 = $request->input('place_1');
    //     $place_2 = $request->input('place_2');
    //     $place_3 = $request->input('place_3');
    //     $limit = $request->input('limit');
    //     $cool_now = $request->input('cool_now');
    //     $cool_give = $request->input('cool_give');
    //     $content = $request->input('content');
    //     Content::create(compact('title', 'place_1', 'place_2', 'place_3', 'limit', 'cool_now', 'cool_give', 'content'));
    // }
}
