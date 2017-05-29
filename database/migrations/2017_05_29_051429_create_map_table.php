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
        Schema::dropIfExists('map');
    }
}
