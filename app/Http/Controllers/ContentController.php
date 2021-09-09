<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Pickup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


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
                $send_or_not = $request->input('send_or_not');
                $content = $request->input('content');
                $data = Content::create(compact('created_user_id', 'title', 'size', 'fishing_area', 'file_name', 'file_path', 'datetime_1', 'place_1', 'datetime_2', 'place_2', 'datetime_3', 'place_3', 'limit', 'process_1', 'process_2', 'process_3', 'process_4', 'process_5', 'process_6', 'process_7', 'process_8', 'process_9', 'process_10', 'cool_now', 'cool_give', 'send_or_not', 'content'));

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
        // 当初の内容
        // $content_get_query = Content::select('*');
        // $items = $content_get_query->find($content_id);
        //

        $content_get_query = Content::select('*');
        $items = $content_get_query->find($content_id);
        $pickup_items = Pickup::where('fish_id', '=', $content_id)->first();


        // echo '<pre>';
        // dd($content_items);
        // echo '<pre>';
        // dd($pickup_items);
        // echo '<pre>';
        // exit;


        // 自分が登録した商品ではないか判定
        // Auth::user()==$created_user_idのとき
        // "受託" "お断り" ボタンを設置

        // 自分が既に申込しているとき
        // 申込はできない
        //削除ボタン設置 




        // 申し込みがあるか
        // contents tableの$id  とpickups tableの$fish_id同じものがあるか確認
        // 申し込みがあるとき




        // 申込がないとき
        // まだありません







        return view('contents.detail', [
            'item' => $items,
            'pickup_items' => $pickup_items,
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

        // echo $request;
        // exit;

        $content_info->content = $request['content'];
        $content_info->save();
        return redirect(route('output'));


        $title = $request->input('title');
        $place_1 = $request->input('place_1');
        $place_2 = $request->input('place_2');
        $place_3 = $request->input('place_3');
        $limit = $request->input('limit');
        $cool_now = $request->input('cool_now');
        $cool_give = $request->input('cool_give');
        $content = $request->input('content');
        Content::create(compact('title', 'place_1', 'place_2', 'place_3', 'limit', 'cool_now', 'cool_give', 'content'));
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



    public function start_guide()
    {
        return view('contents.start_guide');
    }


    public function pickup_guide()
    {
        return view('contents.pickup_guide');
    }
}
