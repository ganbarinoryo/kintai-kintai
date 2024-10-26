<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clocks', function (Blueprint $table) {
            $table->bigIncrements('id');  // 自動インクリメントの主キー
            $table->unsignedBigInteger('user_id');  // usersテーブルのidと紐付ける
            $table->time('clock_in')->nullable();  // 勤務開始時刻
            $table->time('clock_out')->nullable();  // 勤務終了時刻
            $table->timestamps();  // created_at と updated_at を自動生成

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clocks');
    }
}
