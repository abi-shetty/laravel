<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColImgTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('col_img', function (Blueprint $table) {
            $table->increments('ccid',11);
            $table->integer('col_id')->nullable()->unsigned();
            $table->foreign('col_id')->references('col_id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');
            $table->text('image');
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
        Schema::dropIfExists('col_img');
    }
}
