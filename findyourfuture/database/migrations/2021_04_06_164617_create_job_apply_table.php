<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobApplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_apply', function (Blueprint $table) {
            $table->increments('apply_id',11);
            $table->integer('job_id')->unsigned();
            $table->foreign('job_id')->references('job_id')->on('job')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('com_id')->unsigned();
            $table->foreign('com_id')->references('com_id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->text('cv');
            $table->date('do_apply')->nullable();
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
        Schema::dropIfExists('job_apply');
    }
}
