<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_schedules', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('city_id');
            $table->integer('doctor_id');
            // $table->integer('city_id')->unsigned()->index();
            // $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            // $table->integer('doctor_id')->unsigned()->index();
            // $table->foreign('doctor_id')->references('id')->on('doctors')->onDelete('cascade');
            $table->string('day');
            $table->string('start_time');
            $table->string('end_time');
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
        Schema::dropIfExists('doctor_schedules');
    }
}
