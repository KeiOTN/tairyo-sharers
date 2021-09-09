<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contents')->insert([

            [
                'file_name' => '',
                'file_path' => '',
                'created_user_id' => '2',
                'title' => 'この魚取りに来てください01',
                'size' => 'サイズです01',
                'fishing_area' => '玄界灘',
                'datetime_1' => '2021/09/01 11:11:11',
                'place_1' => '◯◯漁港',
                'datetime_2' => '2021/09/01 12:12:12',
                'place_2' => '◯◯釣具店',
                'datetime_3' => '2021/09/01 13:13:13',
                'place_3' => '◯◯スーパー駐車場',
                'limit' => '2021/09/02 20:20:20',
                'process_1' => '',
                'process_2' => '1',
                'process_3' => '1',
                'process_4' => '',
                'process_5' => '',
                'process_6' => '1',
                'process_7' => '',
                'process_8' => '',
                'process_9' => '',
                'process_10' => '',
                'cool_now' => '1',
                'cool_give' => '1',
                'send_or_not' => '1',
                'content' => '条件に合う方の受け取りをお待ちしています！',
                'created_at' => '2021/09/01 10:10:10'




            ],



        ]);
    }
}
