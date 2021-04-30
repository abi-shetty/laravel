<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colleges', function (Blueprint $table) {
            $table->increments('col_id',10);
            $table->string('c_name',50);
            $table->string('clocation',30);
            $table->text('caddress');
            $table->BigInteger('cno1')->length(10)->unsigned();
            $table->BigInteger('cno2')->length(10)->unsigned();
            $table->string('cemail_id',50);
            $table->text('About');
            $table->float('academic',10,2)->nullable();
            $table->float('accommodation',10,2)->nullable();
            $table->float('faculty',10,2)->nullable();
            $table->float('infrastructure',10,2)->nullable();
            $table->float('placement',10,2)->nullable();
            $table->float('average',10,2)->nullable();
            $table->string('affiliated_to',250)->nullable();
            $table->text('certificate');
            $table->string('college_status',25);
            $table->string('cpassword',25);
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
        Schema::dropIfExists('colleges');
    }
}
