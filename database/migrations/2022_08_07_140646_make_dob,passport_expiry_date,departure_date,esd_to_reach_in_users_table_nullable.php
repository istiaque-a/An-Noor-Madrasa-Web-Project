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
            $table->date('dob')->nullable()->change();
            $table->date('passport_expiry_date')->nullable()->change();
            $table->date('departure_date')->nullable()->change();
            $table->date('esd_to_reach')->nullable()->change();
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
            $table->date('dob')->nullable(false)->change();
            $table->date('passport_expiry_date')->nullable(false)->change();
            $table->date('departure_date')->nullable(false)->change();
            $table->date('esd_to_reach')->nullable(false)->change();
        });
    }
};
