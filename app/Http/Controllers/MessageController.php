<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Content;
use App\Models\Pickup;
use App\Models\User;
use App\Models\Message;


class MessageController extends Controller
{

    public function message_save(Request $request)
    {
        $content_id = $request->input('content_id');
        $from = $request->input('from');
        $to = $request->input('to');
        $message = $request->input('message');
        Message::create(compact('from', 'to', 'message', 'content_id'));
        // set_message('メッセージを送信しました。');
        return redirect()->route('each_request', ['pickup_id' => $request->content_id]);    // getに渡す値
    }
}
