<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use App\Models\Message;
use \DB;
use Carbon\Carbon;


class MessageController extends Controller
{

    public function message_save(Request $request)
    {
        $pickup_id = $request->input('pickup_id');
        $from = $request->input('from');
        $to = $request->input('to');
        $message = $request->input('message');
        Message::create(compact('from', 'to', 'message', 'pickup_id'));
        // set_message('メッセージを送信しました。');
        return redirect()->route('each_request', ['pickup_id' => $request->pickup_id]);    // getに渡す値
    }

    public function readtime_save_way1(Request $request)
    {
        // echo 'route1';
        // exit();

        DB::table('messages')
            ->where('id', $request->id)
            ->update([
                'read' => Carbon::now(),
            ]);

        return redirect()->route('each_request', ['pickup_id' => $request->pickups_id]);
    }

    public function readtime_save_way2(Request $request)
    {
        // echo 'route2';
        // exit();

        DB::table('messages')
            ->where('id', $request->id)
            ->update([
                'read' => Carbon::now(),
            ]);

        return redirect()->route('each_request', ['pickup_id' => $request->pickups_id]);
    }
}
