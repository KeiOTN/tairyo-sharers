<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{

    public static function get_profile($user_id)
    {
        $profile = User::where('id', $user_id);
        return $profile;
    }


    public static function update($request, $user_id)
    {
        User::where('id', $user_id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'comment' => $request->comment,
                'giver' => $request->giver,
                'receiver' => $request->receiver

            ]);

        return;
    }
}
