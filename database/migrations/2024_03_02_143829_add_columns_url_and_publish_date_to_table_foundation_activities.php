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
            $table->string('url')->after('activity_body')->nullable();
            $table->string('publish_date')->after('url')->nullable();
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
            $table->dropColumn('url');
            $table->dropColumn('publish_date');
        });
    }
};
