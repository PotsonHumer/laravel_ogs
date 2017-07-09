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

            $table->unsignedBigInteger('siteid')->index()->nullable()->default(NULL)->comment('站點ID');
            $table->foreign('siteid')->references('id')->on('site')->onUpdate('cascade')->onDelete('cascade');
            $table->boolean('admin')->index()->default(false)->comment('後台管理員標記');

            $table->string('f_name')->nullable()->default(NULL)->comment('名稱');
            $table->string('l_name')->nullable()->default(NULL)->comment('姓氏');
            $table->string('nickname')->nullable()->default(NULL)->comment('稱號');

            $table->unsignedBigInteger('avatar')->nullable()->default(NULL)->comment('大頭圖');
            $table->foreign('avatar')->references('id')->on('file')->onUpdate('cascade')->onDelete('set null');

            $table->string('email')->index()->comment('email');
            $table->string('password')->comment('密碼');
            $table->rememberToken()->comment('auth token');
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
