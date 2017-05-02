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
            $table->unsignedInteger('modelid')->index()->comment('模組ID');
            $table->text('parent')->nullable()->comment('父系ID (json)');
            $table->softDeletes()->comment('刪除標籤');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$tableName` comment '資料索引表'");
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
