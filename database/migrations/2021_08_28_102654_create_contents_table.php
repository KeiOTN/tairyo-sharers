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
            $table->string('size')->nullable();
            $table->string('fishing_area')->nullable();
            $table->datetime('datetime_1');
            $table->string('place_1');
            $table->datetime('datetime_2')->nullable();
            $table->string('place_2')->nullable();
            $table->datetime('datetime_3')->nullable();
            $table->string('place_3')->nullable();
            $table->datetime('limit'); // 申込期限
            $table->integer('is_expired'); // 締め切り理由
            $table->string('process_1')->nullable(); // 締め方
            $table->string('process_2')->nullable();
            $table->string('process_3')->nullable();
            $table->string('process_4')->nullable();
            $table->string('process_5')->nullable();
            $table->string('process_6')->nullable();
            $table->string('process_7')->nullable();
            $table->string('process_8')->nullable();
            $table->string('process_9')->nullable();
            $table->string('process_10')->nullable();
            $table->string('cool_now'); // 現在の保冷方法
            $table->string('cool_give'); // 渡すときの保冷方法
            // $table->string('send_or_not');
            $table->string('content')->nullable();
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
