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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('address1')->nullable(false);
            $table->string('address2')->nullable();
            $table->string('city')->nullable(false);
            $table->string('state')->nullable(false);
            $table->string('zip')->nullable(false);
            $table->string('desc')->nullable();
            $table->string('parking')->nullable(false);
            $table->string('images')->nullable();
            $table->string('pref')->nullable(false);
            $table->string('leaseType')->nullable(false);
            $table->string('maxTenant')->nullable(false);
            $table->string('totRent')->nullable(false);
            $table->string('misc')->nullable();
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
        Schema::dropIfExists('properties');
    }
};
