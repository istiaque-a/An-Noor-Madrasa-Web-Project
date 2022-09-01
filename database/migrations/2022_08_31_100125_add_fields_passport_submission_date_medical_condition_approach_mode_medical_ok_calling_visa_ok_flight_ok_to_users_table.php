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
            $table->date('passport_submission_date')->nullable()->after('passport_num');
            $table->smallInteger('medical_condition')->comment('0=>unfit, 1=>fit')->after('medical_date');
            $table->smallInteger('approach_mode')->comment('1=>direct, 2=> via agent')
                        ->after('medical_condition');
            $table->smallInteger('medical_ok')->default(0)->after('approach_mode')->comment('0=> not OK, 1=> Yes Ok');
            $table->smallInteger('calling_visa_ok')->default(0)->after('medical_ok')->comment('0=> not OK, 1=> yes OK');
            $table->smallInteger('flight_ok')->default(0)->after('calling_visa_ok')->comment('0=> not OK, 1=>  yes Ok');

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
            $table->dropColumn('passport_submission_date');
            $table->dropColumn('medical_condition');
            $table->dropColumn('approach_mode');
            $table->dropColumn('medical_ok');
            $table->dropColumn('calling_visa_ok');
            $table->dropColumn('flight_ok');
        });
    }
};
