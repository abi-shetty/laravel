<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegeratingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collegerating', function (Blueprint $table) {
            $table->increments('r_id',11);
            $table->integer('col_id')->nullable()->unsigned();
            $table->foreign('col_id')->references('col_id')->on('colleges')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('user_id')->nullable()->unsigned();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->float('ACADEMIC');
            $table->float('ACCOMMODATION');
            $table->float('FACULTY');
            $table->float('INFRASTRUCTURE');
            $table->float('PLACEMENTS');
            $table->string('title',100);
            $table->text('COMMENTS');
            $table->datetime('rdate')->nullable();
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
        Schema::dropIfExists('collegerating');
    }
}
