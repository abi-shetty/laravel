<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
           // $table->increments('com_id',11);
            $table->increments('com_id',11);
            $table->string('comp_name',200);
            $table->text('caddress');
            $table->BigInteger('cphone')->length(20)->unsigned();
            $table->string('cemail',150);
            $table->text('comp_cin');
            $table->string('comp_pass',25);
            $table->string('comp_status',25);
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
        Schema::dropIfExists('companies');
    }
}
