<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('user_id',11);
            $table->string('full_name',30);
            $table->string('gender',30);
            $table->string('uemail_id',30);
            $table->BigInteger('ucontact_no')->length(20)->unsigned();
            $table->string('uaddress',250);
            $table->string('utype',50);
            $table->string('upassword',30);
            $table->string('ustatus',25);
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
