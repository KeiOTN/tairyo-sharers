<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Services\UserService;

use Illuminate\Http\Request;
use \Auth;
use \DB;

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

    public function profile($id)
    {
        $user_data =  UserService::get_profile($id);
        // $user_get_query = User::select('*');
        // $user_data = $user_get_query->find($user_id)->toArray();


        return view('users.profile', [
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


    public function now_on_deal()
    {
        $contents = DB::table('contents')
            ->where('created_user_id', '=', Auth::id())
            ->where('is_expired', '=', '')
            ->get();
        $count1 = count($contents);

        $pickups = DB::table('pickups')
            ->join('contents', 'contents.id', '=', 'pickups.fish_id')
            ->select('contents.*', 'contents.id as content_id', 'pickups.pickup', 'pickups.is_expired as pickup_is_expired')
            ->where('pickup_user_id', '=', Auth::id())
            // ->where('pickups.is_expired', '=', '')

            ->get();
        $count2 = count($pickups);


        return view('users.now_on_deal', [
            'contents' => $contents,
            'count1' => $count1,
            'pickups' => $pickups,
            'count2' => $count2,
        ]);
    }

    public function history_and_evaluation()
    {

        return view('users.history_and_evaluation', [
            // 'lists' => $lists,
        ]);
    }

    public function setting()
    {

        return view('users.setting', [
            // 'lists' => $lists,
        ]);
    }

    public function terms_of_service()
    {

        return view('users.terms_of_service', [
            // 'lists' => $lists,
        ]);
    }

    public function help()
    {

        return view('users.help', [
            // 'lists' => $lists,
        ]);
    }
}
