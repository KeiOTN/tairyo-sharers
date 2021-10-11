<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use App\Models\Like;
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
        // $user_data =  UserService::get_profile(Auth::id());
        // $user_get_query = User::select('*');
        // $user_data = $user_get_query->find($user_id)->toArray();

        // -- 新着メッセージの通知を出す --
        // way1:受取リクエストした魚のメッセージ
        $own_requests = DB::table('pickups')
            ->join('messages', 'messages.pickup_id', '=', 'pickups.id')
            ->join('users', 'users.id', '=', 'messages.from')
            ->select('pickups.id as pickups_id', 'messages.id as messages_id', 'users.name as from_name', 'message')
            ->where('pickups.pickup_user_id', '=', Auth::id())
            ->where('messages.from', '!=', Auth::id())
            ->where('messages.read', '=', null)
            ->get();
        // messages tableからmessages.pickup_idで検索
        // pickups tableからpickup_user_id == Auth::id()のものを検索
        // from == Auth::id()を除外
        // 既読(read == 1)を除外
        // nameさんから新着メッセージがありますを表示
        // お知らせクリックで既読にdatetime挿入



        // way2:出品した魚にきたメッセージ
        $own_contents = DB::table('contents')
            ->join('pickups', 'pickups.fish_id', '=', 'contents.id')
            ->join('messages', 'messages.pickup_id', '=', 'pickups.id')
            ->join('users', 'users.id', '=', 'messages.from')
            ->select('pickups.id as pickups_id', 'messages.id as messages_id', 'contents.id as contents_id', 'users.name as from_name', 'message', 'title')
            ->where('contents.created_user_id', '=', Auth::id())
            ->where('messages.from', '!=', Auth::id())
            ->where('messages.read', '=', null)
            ->get();

        // contents tableのcreated_user_id == Auth::id()のものを検索
        // pickupsからfish_idに該当するものがあるか
        // messages tableからfish_idに該当するものがあるか
        // from == Auth::id()を除外
        // 既読でない(read==null)
        // titleにnameさんから新着メッセージがありますを表示
        // お知らせクリックで既読にdatetime挿入



        // way3:欲しい！と希望した人へ成立/不成立の結果が出たよ通知
        $result_replys = DB::table('pickups')
            ->join('contents', 'contents.id', '=', 'pickups.fish_id')
            ->select('contents.id as content_id', 'pickups.id as pickup_id', 'title', 'pickup', 'result', 'datetime_1', 'datetime_2', 'datetime_3', 'place_1', 'place_2', 'place_3', 'pickup_detail')
            ->where('pickups.is_answered', '=', 1)
            ->where('pickups.is_expired', '=', null)
            ->where('pickups.pickup_user_id', '=', Auth::id())
            ->get();
        //     pickups tableのis_answered==1 && is_expired==NULL(回答済み, 期限切れではない)のものでpickup_user_id==Auth::id()のものを表示する
        //     必要な情報  contents.id, contents.title, pickups.pickup 
        //     resultをconfigから表示
        //     readにdatetime挿入
        //     あとで期限切れ処理必要だよ



        // way4:受け取りリクエストがきたよ！という通知
        $new_requests = DB::table('pickups')
            ->join('contents', 'contents.id', '=', 'pickups.fish_id')
            ->join('users', 'pickups.pickup_user_id', '=', 'users.id')
            ->select('contents.id as content_id', 'pickups.id as pickup_id', 'users.id as user_id', 'title', 'pickup', 'datetime_1', 'datetime_2', 'datetime_3', 'place_1', 'place_2', 'place_3', 'pickup_detail', 'name')
            ->where('pickups.is_answered', '=', null)
            ->where('contents.created_user_id', '=', Auth::id())
            ->get();

        //     pickups tableとcontents tableをpickups.fish_id=contents.idでinnner join
        //     users tableをusers.id=pickups.pickup_user_idでinnner join
        //     pickups tableのis_answered==null && ==Auth::id()(自分が投稿したcontentsで未回答のもの)を表示


        return view('users.info', [
            'own_requests' => $own_requests,
            'own_contents' => $own_contents,
            'result_replys' =>  $result_replys,
            'new_requests' => $new_requests,
            // 'user_data' => $user_data,
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
        // いいね状態のチェック(COUNTで件数を取得)
        $find_like = DB::table('likes')
            ->where('user_id', '=', Auth::id())
            ->where('liked_user_id', '=', $id)
            ->select('id', 'user_id', 'liked_user_id')
            ->get();

        $like_num = count($find_like);


        return view('users.profile', [
            'user_data' => $user_data,
            'like_num' => $like_num,
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
            // ->where('is_expired', '=', null)
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

    public function like_create(Request $request)
    {
        // いいね状態のチェック(COUNTで件数を取得)
        $find_like = DB::table('likes')
            ->where('user_id', '=', Auth::id())
            ->where('liked_user_id', '=', $request->liked_user_id)
            ->select('id', 'user_id', 'liked_user_id')
            ->get();

        $like_num = count($find_like);

        // いいねしていれば削除,していなければ追加のSQLを作成

        if ($like_num == 0) {
            $user_id = $request->input('user_id');
            $liked_user_id = $request->input('liked_user_id');
            Like::create(compact('user_id', 'liked_user_id'));
        } else {
            DB::table('likes')
                ->where('user_id', '=', Auth::id())
                ->where('liked_user_id', '=', $request->liked_user_id)
                ->select('id', 'user_id', 'liked_user_id')
                ->delete();
            // DB::table('likes')
            //     ->where('user_id', Auth::id())
            //     ->update([
            //         'read' => Carbon::now(),
            //     ]);
        }


        // return redirect(route('profile', [
        //     'id' => $liked_user_id,
        // ]));
        // return redirect()
        //     ->route('profile', ['id' => $request->liked_user_id])
        //     ->with([
        //         'like_num' => $like_num,
        //     ]);

        // return back($like_num);
        //return view('users.profile', ['id' => $request->liked_user_id, 'like_num' => $like_num]);
        return redirect(route('profile', ['id' => $request->liked_user_id]));
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
