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
           $table->integer('activity_type')->after('activity_body')->comment('1=>Past, 2=>Present,3=>Future');
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
            $table->dropColumn('activity_type');
        });
    }
};
