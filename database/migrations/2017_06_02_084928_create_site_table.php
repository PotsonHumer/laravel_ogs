<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $tableName = 'site';
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->nullable()->default(NULL)->comment('站點狀態; NULL => 註冊, 0 => 下線, 1 => 上線');
            $table->string('name')->nullable()->default(NULL)->comment('站點名稱');
        });

        DB::statement("ALTER TABLE `$dbPrefix$tableName` comment '站點註冊表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site', function (Blueprint $table) {
            //
        });
    }
}
