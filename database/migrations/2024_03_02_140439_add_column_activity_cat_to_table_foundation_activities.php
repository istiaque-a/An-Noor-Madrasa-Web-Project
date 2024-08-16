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
        Schema::table('foundation_activities', function (Blueprint $table) {
           $table->integer('activity_cat')->comment('1->Mosque, 2=> Madrasa, 3=> An Noor Foundation, 4=> An Noor Online Media')->default(1)->after('activity_type');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('foundation_activities', function (Blueprint $table) {
            $table->dropColumn('activity_cat');
        });
    }
};
