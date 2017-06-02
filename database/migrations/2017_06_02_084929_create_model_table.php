<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'model';
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->nullable()->default(NULL)->comment('模組狀態; NULL => 全系統關閉, 0 => 前台關閉, 1 => 啟用');
            $table->string('name')->nullable()->default(NULL)->comment('模組名稱');
        });

        DB::statement("ALTER TABLE `$dbPrefix$tableName` comment '模組註冊表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('model');
    }
}
