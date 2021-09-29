<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('messages')->insert([

            [
                // NO.1
                'pickup_id' => '1',
                'from' => '2',
                'to' => '1',
                'message' => '少し遅れそうです。',
                'created_at' => '2021/09/01 10:21:10'
            ],
            [
                // NO.2
                'pickup_id' => '1',
                'from' => '1',
                'to' => '2',
                'message' => '了解しました。',
                'created_at' => '2021/09/01 10:22:10'
            ],
            [
                // NO.3
                'pickup_id' => '2',
                'from' => '3',
                'to' => '1',
                'message' => '明日の都合良いお時間ありますか？',
                'created_at' => '2021/09/01 10:35:10'
            ],
            [
                // NO.4
                'pickup_id' => '2',
                'from' => '1',
                'to' => '3',
                'message' => '18時以降いかがでしょうか。',
                'created_at' => '2021/09/01 10:40:10'
            ],
            [
                // NO.5
                'pickup_id' => '2',
                'from' => '3',
                'to' => '1',
                'message' => '大丈夫です！',
                'created_at' => '2021/09/01 10:50:10'
            ],
            [
                // NO.6
                'pickup_id' => '3',
                'from' => '1',
                'to' => '4',
                'message' => '赤い車で行きます！よろしくお願いします！',
                'created_at' => '2021/09/13 10:31:10'
            ],
            [
                // NO.7
                'pickup_id' => '3',
                'from' => '4',
                'to' => '1',
                'message' => 'こちらは黒のハイエースです！',
                'created_at' => '2021/09/13 10:35:10'
            ],



        ]);
    }
}
