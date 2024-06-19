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
        Schema::create('driver_trucks', function (Blueprint $table) {
            $table->id()->index;
            $table->string('truck_registration_number', 25)->comment('Truck registration plate number')
            ->unique('truck_registration_number');
            $table->string('password',15);
            $table->string('remember_token',100); 
            
           
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('driver_trucks');
       
    }
};
