<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use \DB;
use \Auth;


class ContentController extends Controller
{

    public function input()
    {
        return view('contents.input');
    }


    public function save(Request $request)
    {
        if ($request->file('file')) {

            $this->validate($request, [
                'file' => [
                    // 空でないこと
                    'required',
                    // アップロードされたファイルであること
                    'file',
                    // 画像ファイルであること
                    'image',
                    // MIMEタイプを指定
                    'mimes:jpeg,png',
                ]
            ]);

            if ($request->file('file')->isValid([])) {
                $file_name = $request->file('file')->getClientOriginalName();
                // ↓適当な名前をつけるputFile
                //$file_path = Storage::putFile('/images', $request->file('file'), 'public');
                // 数字で名前をつける
                $file_path = '';
                $created_user_id = $request->input('created_user_id');
                $title = $request->input('title');
                $size = $request->input('size');
                $fishing_area = $request->input('fishing_area');
                $datetime_1 = $request->input('datetime_1');
                $place_1 = $request->input('place_1');
                $datetime_2 = $request->input('datetime_2');
                $place_2 = $request->input('place_2');
                $datetime_3 = $request->input('datetime_3');
                $place_3 = $request->input('place_3');
                $limit = $request->input('limit');
                // $process = $request->process;
                // $process_conversion = implode(",", $process);
                $process_1 = $request->input('process_1');
                $process_2 = $request->input('process_2');
                $process_3 = $request->input('process_3');
                $process_4 = $request->input('process_4');
                $process_5 = $request->input('process_5');
                $process_6 = $request->input('process_6');
                $process_7 = $request->input('process_7');
                $process_8 = $request->input('process_8');
                $process_9 = $request->input('process_9');
                $process_10 = $request->input('process_10');
                $cool_now = $request->input('cool_now');
                $cool_give = $request->input('cool_give');
                // $send_or_not = $request->input('send_or_not');
                $content = $request->input('content');
                $data = Content::create(compact('created_user_id', 'title', 'size', 'fishing_area', 'file_name', 'file_path', 'datetime_1', 'place_1', 'datetime_2', 'place_2', 'datetime_3', 'place_3', 'limit', 'process_1', 'process_2', 'process_3', 'process_4', 'process_5', 'process_6', 'process_7', 'process_8', 'process_9', 'process_10', 'cool_now', 'cool_give', 'content'));

                $file_path = Storage::putFileAs('/images', $request->file('file'), $data->id, 'public');
            } else {
                // print('ルート１');
                // exit;
            }
        }
        return redirect(route('output'));
    }

    public function dashboard()
    {
        $contents_get_query = Content::select('*');
        $items = $contents_get_query->get();

        return view('dashboard', [
            'items' => $items,
        ]);
    }


    public function output()
    {
        $contents_get_query = Content::select('*');
        $items = $contents_get_query->get();

        return view('contents.output', [
            'items' => $items,
        ]);
    }


    public function detail($content_id)
    {
        $item = Content::select('*')->find($content_id);  // 商品情報

        $pickups = DB::table('pickups')
            ->join('users', 'users.id', '=', 'pickups.pickup_user_id')
            ->join('contents', 'contents.id', '=', 'pickups.fish_id')
            ->select('pickups.id as pickups_id', 'pickups.fish_id', 'pickups.pickup', 'pickups.pickup_detail', 'pickups.is_answered', 'users.id as users_id', 'users.name', 'contents.*')
            ->where('is_answered', '!=', 1)->orWhereNull('is_answered')
            ->where('fish_id', '=', $content_id)
            ->get();  // 申し込みに関する情報（未回答全て）
        $count = count($pickups); // 申し込み件数(未回答)

        $pickups_2 = DB::table('pickups')
            ->join('users', 'users.id', '=', 'pickups.pickup_user_id')
            ->join('contents', 'contents.id', '=', 'pickups.fish_id')
            ->where('pickups.fish_id', '=', $content_id)
            ->get();  // 申し込みに関する情報（申込全て）
        $count_total = count($pickups_2); //申し込み件数(総数)

        $pickups_own = DB::table('pickups')
            ->join('users', 'users.id', '=', 'pickups.pickup_user_id')
            ->join('contents', 'contents.id', '=', 'pickups.fish_id')
            ->select('pickups.id as pickups_id')
            ->where('pickups.fish_id', '=', $content_id)
            ->where('pickups.pickup_user_id', '=', Auth::id())
            ->get();
        $pickups_own_exist = count($pickups_own); //申込履歴があるか

        $answers = DB::table('pickups')
            ->join('users', 'users.id', '=', 'pickups.pickup_user_id')
            ->select('pickups.*', 'pickups.id as pickups_id', 'users.id as users_id', 'users.name')
            ->where('is_answered', '=', 1)
            ->where('fish_id', '=', $content_id)
            ->get();  //回答済みのリクエスト情報


        $created_user_id = $item['created_user_id'];
        $created_user_data = User::where('id', '=', $created_user_id)->first();
        // $pickup_user_id = $pickup_items['pickup_user_id'];
        // $pickup_user_data = User::where('id', '=', $pickup_user_id)->first();

        return view('contents.detail', [
            'item' => $item,
            'pickups' => $pickups,
            'created_user_data' => $created_user_data,
            // 'pickup_user_data' => $pickup_user_data,
            'count' => $count,
            'count_total' =>  $count_total,
            'pickups_own' => $pickups_own,
            'pickups_own_exist' => $pickups_own_exist,
            'answers' => $answers,

        ]);
    }

    public function edit($content_id)
    {
        $content_get_query = Content::select('*');
        $item = $content_get_query->find($content_id);

        return view('contents.edit', [
            'item' => $item,
        ]);
    }

    public function update(Request $request)
    {
        $content_get_query = Content::select('*');
        $content_info = $content_get_query->find($request['id']);

        $content_info->content = $request['content'];
        $content_info->save();
        return redirect(route('output'));
    }

    public function delete(Request $request)
    {

        $contents_delete_query = Content::select('*');
        $contents_delete_query->findOrFail($request['content_id']); // ソフトデリート
        $contents_delete_query->delete();

        return redirect(route('output'));
    }

    public function pickup_request($content_id)
    {
        $content_get_query = Content::select('*');
        $items = $content_get_query->find($content_id);


        return view('contents.pickup_request', [
            'item' => $items,
        ]);
    }

    public function pickup_request_save(Request $request)
    {
        $fish_id = $request->input('fish_id');
        $pickup_user_id = $request->input('pickup_user_id');
        $pickup = $request->input('pickup');
        $pickup_detail = $request->input('pickup_detail');
        Pickup::create(compact('fish_id', 'pickup_user_id', 'pickup', 'pickup_detail'));

        return view('contents.pickup_request_comfirm');
    }


    public function pickup_request_list()
    {
        $pickup_requests_get_query = Pickup::select('*');
        $lists = $pickup_requests_get_query->get()->toArray();

        // {{ $list['fish_id'] }}
        //         {{ $list['pickup_user_id'] }}
        //         {{ $list['pickup'] }}


        return view('contents.pickup_request_list', [
            'lists' => $lists,
        ]);
    }

    public function pickup_request_detail()
    {
        $pickup_requests_get_query = Pickup::select('*');
        $lists = $pickup_requests_get_query->get()->toArray();

        // {{ $list['fish_id'] }}
        //         {{ $list['pickup_user_id'] }}
        //         {{ $list['pickup'] }}


        return view('contents.pickup_request_detail', [
            'lists' => $lists,
        ]);
    }

    public function each_request($pickup_id)
    {
        $pickup = Pickup::select('*')->find($pickup_id);
        $content_id = $pickup->fish_id;
        $content = Content::select('*')->find($content_id);
        $pickup_user_id = $pickup->pickup_user_id;
        $pickup_user = User::select('*')->find($pickup_user_id);

        $created_user = User::select('*')->find($content->created_user_id);

        $messages = Message::select('*')
            ->where('pickup_id', '=', $pickup->id)
            ->orderBy('created_at', 'desc')
            ->get();


        return view('contents.each_request', [
            'pickup_id' => $pickup_id,
            'pickup' => $pickup,
            'content' => $content,
            'pickup_user' =>  $pickup_user,
            'created_user' => $created_user,
            'messages' => $messages,

        ]);
    }



    public function result_save(Request $request)
    {
        DB::table('pickups')
            ->where('id', $request->id)
            ->update([
                'result' => $request->result,
                'is_answered' => $request->is_answered

            ]);

        return redirect()->route('detail', ['content_id' => $request->content_id]);    // getに渡す値
    }

    public function start_guide()
    {
        return view('contents.start_guide');
    }


    public function pickup_guide()
    {
        return view('contents.pickup_guide');
    }
}
