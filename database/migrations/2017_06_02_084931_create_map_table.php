<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'map';
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('siteid')->index()->comment('站點ID');
            $table->foreign('siteid')->references('id')->on('site')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('modelid')->index()->comment('模組ID');
            $table->foreign('modelid')->references('id')->on('model')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('dataid')->index()->comment('對應資料ID');
            $table->foreign('dataid')->references('id')->on('data')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('level')->index()->default(0)->comment('所屬分類層次');
            $table->integer('sort')->default(0)->comment('排序號碼');
            $table->text('struct')->nullable()->default(NULL)->comment('分類結構 json ([id,...])');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$tableName` comment '資料分類索引表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('map');
    }
}
