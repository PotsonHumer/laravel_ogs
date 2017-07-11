<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrateAuthTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $tableName = 'auth';

    public function up()
    {
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('siteid')->index()->nullable()->default(NULL)->comment('站點ID');
            $table->foreign('siteid')->references('id')->on('site')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name')->nullable()->default(NULL)->comment('權限名稱');
            $table->integer('level')->nullable()->default(NULL)->comment('權限等級; NULL 為最低等級 (一般使用者)');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$this->tableName` comment '會員權限資料表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this->tableName, function (Blueprint $table) {
            $table->dropForeign(['siteid']);
            $table->dropIfExists($this->tableName);
        });
    }
}
