<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePickupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->integer('fish_id');  // =content tableのidと同じ
            $table->integer('pickup_user_id'); // 希望者
            $table->integer('pickup'); // 受取条件番号
            $table->string('pickup_detail')->default(null); // textarea
            $table->string('result')->default(null); // 結果番号
            $table->string('is_answered')->default(null); // 回答済
            $table->string('is_expired')->default(null); //申込期限切れ
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pickups');
    }
}
