<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSensorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sensors', function (Blueprint $table) {
            $table->id('sensor_id');
            $table->string('sensor_name');
            $table->string('sensor_description')->nullable();
            $table->string('sensor_unit')->nullable();
            $table->bigInteger('sensor_device')->index()->unsigned()->nullable();
            $table->string('sensor_credential')->unique();
            $table->timestamps();

            $table->foreign('sensor_device')->references('device_id')->on('devices')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sensors');
    }
}
