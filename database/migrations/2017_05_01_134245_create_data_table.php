<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'data';
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('siteid')->index()->comment('站點ID');
            $table->foreign('siteid')->references('id')->on('site')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('modelid')->index()->comment('模組ID');
            $table->foreign('modelid')->references('id')->on('model')->onUpdate('cascade')->onDelete('cascade');

            $table->string('type')->index()->default('data')->comment('資料類別 data => 資料、catalog => 分類');
            $table->boolean('status')->default(true)->comment('啟用狀態');
            $table->boolean('hot')->default(false)->comment('熱門標記狀態');
            $table->boolean('new')->default(false)->comment('最新標記狀態');
            $table->softDeletes()->comment('刪除標籤');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$tableName` comment '資料整合表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('data');
    }
}
