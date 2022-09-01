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

            $table->string('passport_size_photo')->nullable()->after('esd_to_reach');
            $table->string('nid_photo')->nullable()->after('passport_size_photo');
            $table->string('passport_copy')->nullable()->after('nid_photo');
            $table->string('vaccine_photo')->nullable()->after('passport_copy');

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

            $table->dropColumn('passport_size_photo');
            $table->dropColumn('nid_photo');
            $table->dropColumn('passport_copy');
            $table->dropColumn('vaccine_photo');
            
            
           
        });
    }
};
