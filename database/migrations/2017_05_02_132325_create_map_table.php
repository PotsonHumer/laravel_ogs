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
            $table->unsignedInteger('modelid')->index()->comment('模組ID');

            $table->unsignedBigInteger('data')->index()->comment('Data ID');
            $table->foreign('data')->references('id')->on('data')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedBigInteger('parent')->index()->comment('父系 Data ID');
            $table->foreign('parent')->references('id')->on('data')->onUpdate('cascade')->onDelete('cascade');

            $table->unsignedInteger('level')->default('0')->index()->comment('類別層次');
            $table->text('breadcrumb')->comment('逐層履歷');
            $table->integer('sort')->default('1')->index()->comment('排序');

            $table->softDeletes()->comment('刪除標籤');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$tableName` comment '類別索引表'");
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
