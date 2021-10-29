<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->text('bg_member')->nullable();
            $table->string('name');
            $table->string('gender')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->boolean('active')->default(0);
            $table->string('activation_token')->nullable();
            $table->text('profile_picture')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('address')->nullable();
            $table->string('birth_date')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->unique()->nullable();
            $table->datetime('registered_at')->nullable();
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
        Schema::dropIfExists('clients');
    }
}
