<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('college_course', function (Blueprint $table) {
            $table->increments('cr_id',11);
            $table->integer('col_id')->nullable()->unsigned();
            $table->foreign('col_id')->references('col_id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('course_id')->nullable()->unsigned();
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->string('fees',50);
            $table->text('mode');
            $table->text('placement');
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
        Schema::dropIfExists('college_course');
    }
}
