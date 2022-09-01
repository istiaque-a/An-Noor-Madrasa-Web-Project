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

            $table->string('calling_photo')->nullable()->after('vaccine_photo');
            $table->string('visa_stamping_photo')->nullable()->after('calling_photo');
            $table->string('flight_photo')->nullable()->after('visa_stamping_photo');
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

            $table->dropColumn('calling_photo');
            $table->dropColumn('visa_stamping_photo');
            $table->dropColumn('flight_photo');
        });
    }
};
