<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('request_course', function (Blueprint $table) {
            $table->increments('rc_id',11);
            $table->integer('col_id')->nullable()->unsigned();
            $table->foreign('col_id')->references('col_id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');
            $table->string('subject',50);
            $table->text('request');
            $table->string('rstatus',25);
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
        Schema::dropIfExists('request_course');
    }
}
