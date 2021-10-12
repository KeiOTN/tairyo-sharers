<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([

            [
                // 以下、ユーザー
                'name' => '釣太郎',
                'email' => 'test_user01@example.com',
                'password' => Hash::make('password123'),
                'comment' => '北九州周辺の遊漁船に乗っています',
                'giver' => '1',
                'receiver' => '',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'ブリ次郎',
                'email' => 'test_user02@example.com',
                'password' => Hash::make('password123'),
                'comment' => '福岡の糸島がホームグラウンドです',
                'giver' => '1',
                'receiver' => '1',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'タコ仙人',
                'email' => 'test_user03@example.com',
                'password' => Hash::make('password123'),
                'comment' => '東京湾で釣りしてます',
                'giver' => '1',
                'receiver' => '',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => '釣りガールsaya',
                'email' => 'test_user04@example.com',
                'password' => Hash::make('password123'),
                'comment' => '関門海峡付近から出船してます',
                'giver' => '1',
                'receiver' => '1',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => 'セミプロ料理人takuya',
                'email' => 'test_user05@example.com',
                'password' => Hash::make('password123'),
                'comment' => '福岡市周辺に受け取りに行けます！',
                'giver' => '',
                'receiver' => '1',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => '魚好き主婦ai',
                'email' => 'test_user06@example.com',
                'password' => Hash::make('password123'),
                'comment' => 'なかなか丸ごとの魚を捌く機会がないので、受け取れたら嬉しいです',
                'giver' => '',
                'receiver' => '1',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => '学生田中',
                'email' => 'test_user07@example.com',
                'password' => Hash::make('password123'),
                'comment' => '美味しい魚が食べたいです',
                'giver' => '',
                'receiver' => '1',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                'name' => '山田ボウズ',
                'email' => 'test_user08@example.com',
                'password' => Hash::make('password123'),
                'comment' => '自分も釣りするけどなかなか釣れないので、大きな魚を捌いてみたいです',
                'giver' => '1',
                'receiver' => '1',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],
            [
                // 管理者
                'name' => 'test_admin01',
                'email' => 'test_admin01@example.com',
                'password' => Hash::make('password123'),
                'comment' => '',
                'giver' => '',
                'receiver' => '',
                'is_admin' => '',
                'created_at' => '2021/01/01 11:11:11'
            ],


        ]);
    }
}
