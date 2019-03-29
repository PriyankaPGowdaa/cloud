<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffLoginsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff_logins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->nullable();
            $table->string('name')->nullable();
            $table->string('password')->nullable();
             $table->string('phoneNo')->nullable();
              $table->string('address')->nullable();
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
        Schema::dropIfExists('staff_logins');
    }
}
