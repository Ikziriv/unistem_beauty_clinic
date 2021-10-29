<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDoctorSubsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_subs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('img_head');
            $table->string('title')->nullable();
            $table->string('spesialis')->nullable();
            $table->string('name');
            $table->string('phone')->nullabel();
            $table->string('sub_title');
            $table->string('quote');
            $table->text('content');
            $table->boolean('is_vip')->nullable();
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
        Schema::dropIfExists('doctor_subs');
    }
}
