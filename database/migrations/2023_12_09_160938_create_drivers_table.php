<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id()->index;
            $table->string('email', 50)->comment('user email adress');
            $table->foreignId('login_id')->constraints(table: 'logins')->comment('login table id'); 
            $table->foreignId('id_driver_truck')->constraints(table: 'driver_trucks')->comment('driver truck table id');
            $table->foreignId('id_place')->constraints(table: 'places')->comment('driver place');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('drivers');
    }
};
