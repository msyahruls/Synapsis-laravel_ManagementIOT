<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_logs', function (Blueprint $table) {
            $table->id('dl_id');
            $table->string('dl_user')->nullable();
            $table->string('dl_device')->nullable();
            $table->string('dl_sensor')->nullable();
            $table->float('dl_value');
            $table->timestamps();

            $table->foreign('dl_user')->references('email')->on('users')->onDelete('cascade');
            $table->foreign('dl_device')->references('device_credential')->on('devices')->onDelete('cascade');
            $table->foreign('dl_sensor')->references('sensor_credential')->on('sensors')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_logs');
    }
}
