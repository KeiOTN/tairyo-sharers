<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikeUser extends Model
{
    use HasFactory;
    //いいねしているユーザー
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    //いいねされているユーザー
    public function liked_user()
    {
        return $this->belongsTo(User::class);
    }

    //いいねが既にされているかを確認
    public function like_exist($id, $liked_user_id)
    {
        //LikeUsersテーブルのレコードにいいねしたユーザーidといいねされたユーザーidが一致するものを取得
        $exist = LikeUser::where('user_id', '=', $id)->where('liked_user_id', '=', $liked_user_id)->get();

        // レコード（$exist）が存在するなら
        if (!$exist->isEmpty()) {
            return true;
        } else {
            // レコード（$exist）が存在しないなら
            return false;
        }
    }
}
