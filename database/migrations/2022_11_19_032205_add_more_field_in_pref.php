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
        Schema::table('pref', function (Blueprint $table) {
            $table->string('student')->nullable();
            $table->string('couple')->nullable();
            $table->string('parking')->nullable();
            $table->string('smoke')->nullable();
            $table->string('utility')->nullable();
            $table->string('pet')->nullable();
            $table->string('disiblity')->nullable();
            $table->string('furnish')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pref', function (Blueprint $table) {
            $table->dropColumn('student');
            $table->dropColumn('couple');
            $table->dropColumn('parking');
            $table->dropColumn('smoke');
            $table->dropColumn('utility');
            $table->dropColumn('pet');
            $table->dropColumn('disiblity');
            $table->dropColumn('furnish');
        });
    }
};
