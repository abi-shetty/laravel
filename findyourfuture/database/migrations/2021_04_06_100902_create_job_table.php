<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('job', function (Blueprint $table) {

            $table->increments('job_id',11);
           $table->integer('com_id')->unsigned();
            $table->foreign('com_id')->references('com_id')->on('companies')->onDelete('cascade')->onUpdate('cascade');
            $table->string('title',100);
            $table->string('job_type',200);
            $table->string('position',200);
            $table->string('salary',50);
            $table->text('job_role');
            $table->text('experience');
            $table->text('key_skill');
            $table->text('qulification');
            $table->text('discription');
            $table->string('location',50);
            $table->date('post_date')->nullable();
            $table->BigInteger('applied_count')->length(11)->unsigned()->nullable();
            $table->string('jstatus',50);
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
        Schema::dropIfExists('job');
    }
}
