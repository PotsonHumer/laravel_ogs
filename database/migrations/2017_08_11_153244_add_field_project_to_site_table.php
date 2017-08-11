<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldProjectToSiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    private $tableName = 'site';

    public function up()
    {
        Schema::hasTable($this->tableName);
        Schema::table($this->tableName, function(Blueprint $table) {
            $table->string('project')->index()->nullable()->default(NULL)->comment('系統名稱');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::hasTable($this->tableName);
        Schema::table($this->tableName, function(Blueprint $table) {
            $table->dropColumn('project');
        });
    }
}
