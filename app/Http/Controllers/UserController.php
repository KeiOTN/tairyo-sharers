<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Services\UserService;

use Illuminate\Http\Request;
use \Auth;

class UserController extends Controller
{
    public function info()
    {
        // お知らせ画面
        $user_data =  UserService::get_profile(Auth::id());
        // $user_get_query = User::select('*');
        // $user_data = $user_get_query->find($user_id)->toArray();

        return view('users.info', [
            'user_data' => $user_data,
        ]);
    }

    public function mypage()
    {
        // マイページ
        $user_data =  UserService::get_profile(Auth::id());
        // $user_get_query = User::select('*');
        // $user_data = $user_get_query->find($user_id)->toArray();

        return view('users.mypage', [
            'user_data' => $user_data,
        ]);
        // return redirect(route('mypage'));
    }

    public function myprofile()
    {
        $user_data =  UserService::get_profile(Auth::id());
        // $user_get_query = User::select('*');
        // $user_data = $user_get_query->find($user_id)->toArray();


        return view('users.myprofile', [
            'user_data' => $user_data,
        ]);
    }

    public function myprofile_edit()
    {


        $user_data =  UserService::get_profile(Auth::id());
        // $user_get_query = User::select('*');
        // $user_data = $user_get_query->find($user_id)->toArray();


        return view('users.myprofile_edit', [
            'user_data' => $user_data,
        ]);
    }

    public function myprofile_update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',

        ]);

        UserService::update($request, Auth::id());

        return redirect(route('myprofile'));
    }
}
