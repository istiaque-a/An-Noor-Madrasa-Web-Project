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
        Schema::table('users', function (Blueprint $table) {
            $table->smallInteger('country')->default(0)->change();
            $table->smallInteger('nationality')->default(0)->change();
            $table->smallInteger('country_of_citizenship')->default(0)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('country')->change();
            $table->string('nationality')->change();
            $table->string('country_of_citizenship')->change();
        });
    }
};
