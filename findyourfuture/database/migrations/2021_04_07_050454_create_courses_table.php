<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('course_id');
            $table->text('course');
            $table->string('stream',50);
            $table->string('after',50);
            $table->string('duration',30);
            $table->string('type',50);
            $table->text('about');
            $table->string('exam_type',250);
            $table->text('eligibility');
            $table->text('recruitment')->nullable();
            $table->text('jobs')->nullable();
            $table->string('fees',100);
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
        Schema::dropIfExists('courses');
    }
}
