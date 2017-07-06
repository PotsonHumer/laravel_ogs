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

    private $tableName = 'site';

    public function up()
    {
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->boolean('status')->nullable()->default(NULL)->comment('站點狀態; NULL => 註冊, 0 => 下線, 1 => 上線');
            $table->string('name')->nullable()->default(NULL)->comment('站點名稱');
        });

        DB::statement("ALTER TABLE `$dbPrefix$this->tableName` comment '站點註冊表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
