<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use App\Http\Services\UserService;
use Carbon\Carbon;

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

        // if ($request->file('file')) {

        //     $this->validate($request, [
        //         'file' => [
        //             // 空でないこと
        //             //'required',
        //             // アップロードされたファイルであること
        //             'file',
        //             // 画像ファイルであること
        //             'image',
        //             // MIMEタイプを指定
        //             'mimes:jpeg,png',
        //         ]
        //     ]);
        //     if ($request->file('file')->isValid([])) {


        //         $request->validate([
        //             'name' => 'required',
        //             'email' => 'required',
        //         ]);

        //         UserService::update($request, Auth::id());
        //     }
        // }


        if ($request->file == null) {
            // 画像変更なし
            $user_data =  UserService::get_profile(Auth::id());
            $old_file_path =  $user_data['file_path'];
            // echo 'route1';
            // echo $user_data['file_path'];
            $request->validate([
                'name' => 'required',
                'email' => 'required',
            ]);
            User::where('id', Auth::id())
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'comment' => $request->comment,
                    'giver' => $request->giver,
                    'receiver' => $request->receiver
                ]);
        } else {
            // 画像変更あり
            // echo 'route2';
            $request->validate([
                'name' => 'required',
                'email' => 'required',
                'file' => [
                    // 空でもOk
                    'nullable',
                    // アップロードされたファイルであること
                    'file',
                    // 画像ファイルであること
                    'image',
                    // MIMEタイプを指定
                    'mimes:jpeg,png',
                ]
            ]);
            UserService::update($request, Auth::id());
        }


        return redirect(route('profile', ['id' => Auth::id()]))->with('status', '編集が完了しました');
    }


    public function now_on_deal()
    {
        // 受取募集中の魚
        $contents = DB::table('contents')
            ->where('created_user_id', '=', Auth::id())
            ->where('is_expired', '=', null)
            ->where('deleted_at', '=', null)
            ->get();
        $count1 = count($contents);

        // 受取リクエストした魚
        $pickups = DB::table('pickups')
            ->join('contents', 'contents.id', '=', 'pickups.fish_id')
            ->select('contents.*', 'contents.id as content_id', 'pickups.id as pickup_id', 'pickups.pickup', 'pickups.pickup_detail', 'pickups.pickup_user_id', 'pickups.is_expired as pickup_is_expired')
            ->where('pickups.pickup_user_id', '=', Auth::id())
            // ->where('pickups.is_expired', '=', '')
            // ->orWhereNull('pickups.is_answered')
            ->get();
        // ->toArray();
        // var_dump($pickups);
        // var_dump(Auth::id());
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

    public function like_list()
    {

        return view('users.like_list', [
            // 'lists' => $lists,
        ]);
    }
}
