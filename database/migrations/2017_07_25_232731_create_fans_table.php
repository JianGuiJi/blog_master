<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('fans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('fan_id')->default(0)->comment('粉丝Id');//粉丝Id
            $table->integer('star_id')->default(0)->comment('被关注的ID');//被关注的ID
            $table->timestamps();
            $table->comment = '粉丝表';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('fans');
    }
}
