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
            $table->smallInteger('division_id')->nullable()->after('gender');
            $table->smallInteger('district_id')->nullable()->after('division_id');
            $table->smallInteger('thana_id')->nullable()->after('district_id');
            $table->string('postal_code',20)->nullable()->after('thana_id');
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

            $table->dropColumn('division_id');
            $table->dropColumn('district_id');
            $table->dropColumn('thana_id');
            $table->dropColumn('postal_code');

        });
    }
};
