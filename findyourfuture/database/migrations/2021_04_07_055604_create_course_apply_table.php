<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_apply', function (Blueprint $table) {
            $table->increments('capply_id',11);
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('col_id')->nullable()->unsigned();
            $table->foreign('col_id')->references('col_id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('course_id')->nullable()->unsigned();
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('city',50)->nullable();
            $table->year('psession',4)->nullable();
            $table->string('mode',250)->nullable();
            $table->string('cstatus',25)->nullable();

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
        Schema::dropIfExists('course_apply');
    }
}
