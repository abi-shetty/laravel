<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobseekerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jobseeker', function (Blueprint $table) {
            $table->increments('jseeker_id',11);
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('qualification');
            $table->text('skills');
            $table->text('resume');
            $table->string('fresher',20);
            $table->text('pre_comp')->nullable();
            $table->string('experience',30)->nullable();
            $table->string('pre_position',100)->nullable();
            $table->string('pre_salary',100)->nullable();
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
        Schema::dropIfExists('jobseeker');
    }
}
