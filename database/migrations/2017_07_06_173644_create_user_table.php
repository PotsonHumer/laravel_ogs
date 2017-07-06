<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $tableName = 'users';

    public function up()
    {
        $dbPrefix = Config::get('database.connections.mysql.prefix');

        Schema::create($this->tableName, function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('siteid')->index()->comment('站點ID');
            $table->foreign('siteid')->references('id')->on('site')->onUpdate('cascade')->onDelete('cascade');

            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `$dbPrefix$this->tableName` comment '會員資料表'");
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
