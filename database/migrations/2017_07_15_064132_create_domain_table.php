<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDomainTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $tableName = 'domain';

    public function up()
    {
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($this->tableName, function(Blueprint $table){
            $table->bigIncrements('id');

            $table->unsignedBigInteger('siteid')->index()->nullable()->default(NULL)->comment('站點ID');
            $table->foreign('siteid')->references('id')->on('site')->onUpdate('cascade')->onDelete('cascade');

            $table->boolean('ssl')->index()->default(false)->comment('SSL 加密');
            $table->string('name')->index()->nullable()->default(NULL)->comment('綁定 Domain name');

            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$this->tableName` comment '站點對應 Domain 資料表'");
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
