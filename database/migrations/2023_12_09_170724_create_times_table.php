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
        Schema::create('times', function (Blueprint $table) {
            $table->id()->index;
            $table->time('start_time')->comment('time when driver arrival'); 
            $table->time('end_time')->comment('time when finish'); 
            $table->date('date')->comment('date when driber arrival'); 
            $table->bigInteger('driver_id')->comment('driver idenfication number');
            $table->bigInteger('place_id')->comment('place idenfication number');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('times');
    }
};
