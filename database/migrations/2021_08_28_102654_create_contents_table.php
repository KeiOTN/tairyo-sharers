<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {

            $table->id();
            $table->integer('created_user_id');
            $table->string('title');
            $table->string('file_path');
            $table->string('file_name');
            $table->string('size')->default(null);
            $table->string('fishing_area')->default(null);
            $table->datetime('datetime_1');
            $table->string('place_1');
            $table->datetime('datetime_2')->default(null);
            $table->string('place_2')->default(null);
            $table->datetime('datetime_3')->default(null);
            $table->string('place_3')->default(null);
            $table->datetime('limit'); // 申込期限
            $table->string('process_1')->default(null); // 締め方
            $table->string('process_2')->default(null);
            $table->string('process_3')->default(null);
            $table->string('process_4')->default(null);
            $table->string('process_5')->default(null);
            $table->string('process_6')->default(null);
            $table->string('process_7')->default(null);
            $table->string('process_8')->default(null);
            $table->string('process_9')->default(null);
            $table->string('process_10')->default(null);
            $table->string('cool_now'); // 現在の保冷方法
            $table->string('cool_give'); // 渡すときの保冷方法
            // $table->string('send_or_not');
            $table->string('content')->default(null);
            $table->integer('is_expired')->default(null); // 締切前NULL,締切後理由をintで入力
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contents');
    }
}
