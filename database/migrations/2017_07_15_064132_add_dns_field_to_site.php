<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDnsFieldToSite extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('site',function(Blueprint $table){
            $table->text('dns')->nullable()->default(NULL)->comment('綁定 DNS');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('site',function(Blueprint $table){
            $table->dropColumn('dns');
        });
    }
}
