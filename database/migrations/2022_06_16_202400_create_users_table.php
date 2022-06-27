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
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('localisation_id')->default('1')->nullable();
            $table->unsignedBigInteger('spicialiter_id')->default('1')->nullable();
            $table->foreign('localisation_id')->references('id') ->on('localisations')->onDelete('cascade');
            $table->foreign('spicialiter_id')->references('id') ->on('spicialiters')->onDelete('cascade');
            $table->string('nom');
            $table->string('prenom');
            $table->text('description')->nullable();
            $table->string('status')->nullable();
            $table->text('phone');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            
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
};
