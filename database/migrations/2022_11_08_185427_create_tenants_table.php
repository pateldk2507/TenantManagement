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
        Schema::create('tenants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fname', 100)->nullable();
            $table->string('lname', 100)->nullable();
            $table->date('dob')->nullable();
            $table->string('email', 50)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('property', 150)->nullable();
            $table->string('unit', 3)->nullable();
            $table->string('room', 3)->nullable();
            $table->string('leaseType', 50)->nullable();
            $table->date('signedDate')->nullable();
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
        Schema::dropIfExists('tenants');
    }
};
