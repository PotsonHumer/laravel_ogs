<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFieldTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'field';
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('siteid')->index()->comment('站點ID');
            $table->foreign('siteid')->references('id')->on('site')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('modelid')->index()->comment('模組ID');
            $table->foreign('modelid')->references('id')->on('model')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('dataid')->index()->comment('data ID');
            $table->foreign('dataid')->references('id')->on('data')->onUpdate('cascade')->onDelete('cascade');

            $table->char('lang',5)->index()->comment('語系標籤');
            $table->string('name')->index()->comment('欄位名稱');
            $table->string('value')->index()->comment('欄位資料');
            $table->text('content')->comment('欄位資料 (text)');
            $table->softDeletes()->comment('刪除標籤');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$tableName` comment '資料欄位表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('field');
    }
}
