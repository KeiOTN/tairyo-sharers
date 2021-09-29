<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class PickupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pickups')->insert([

            [
                // NO.1
                'fish_id' => '1',
                'pickup_user_id' => '2',
                'pickup' => '1',
                'pickup_detail' => '',
                'created_at' => '2021/09/01 10:20:10'
            ],
            [
                // NO.2
                'fish_id' => '1',
                'pickup_user_id' => '3',
                'pickup' => '4',
                'pickup_detail' => '日時変更希望です。',
                'created_at' => '2021/09/01 10:30:10'
            ],
            [
                // NO.3
                'fish_id' => '9',
                'pickup_user_id' => '1',
                'pickup' => '3',
                'pickup_detail' => '',
                'created_at' => '2021/09/13 10:30:10'
            ],

        ]);
    }
}
