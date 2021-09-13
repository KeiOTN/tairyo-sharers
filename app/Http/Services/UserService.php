<?php

namespace App\Http\Services;

use App\Models\User;

class UserService
{

    public static function get_profile($user_id)
    {
        // $profile = User::select('*')->where('id', $user_id)->toArray();
        $profile = User::select('*')->find($user_id)->toArray();
        // $user_get_query = User::select('*');
        // $user_data = $user_get_query->find($user_id)->toArray();

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
