<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsActiveToClocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clocks', function (Blueprint $table) {
            $table->boolean('is_active')->default(false); // 勤務中かどうかを判定する、初期値はfalse
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clocks', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
}
