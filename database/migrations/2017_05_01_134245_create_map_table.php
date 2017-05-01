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
        Schema::create('map', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('siteid')->index()->comment('站點ID');
            $table->unsignedBigInteger('gid')->index()->comment('語系ID');
            $table->char('lang',5)->index()->comment('語系標籤');
            $table->text('parent')->nullable()->comment('父系ID (json)');
            $table->unsignedBigInteger('next')->nullable()->comment('前一項ID');
            $table->unsignedBigInteger('prev')->nullable()->comment('後一項ID');
            $table->integer('sort')->default(0)->comment('排序');
            $table->softDeletes()->comment('刪除標籤');
            $table->timestamps();
        });
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
