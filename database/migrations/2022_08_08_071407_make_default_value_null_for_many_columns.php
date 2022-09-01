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
            $table->string('middle_name')->nullable()->change();
            $table->string('first_lang')->nullable()->change();
            $table->string('country_of_citizenship')->nullable()->change();
            $table->string('nationality')->nullable()->change();
            $table->string('passport_num')->nullable()->change();
            $table->string('nid_num')->nullable()->change();
            $table->string('marital_status')->nullable()->change();
            $table->string('gender')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->string('city')->nullable()->change();
            $table->string('country')->nullable()->change();
            $table->string('state_province')->nullable()->change();
            $table->string('zip')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->string('organization_category')->nullable()->change();
            $table->string('company')->nullable()->change();
            $table->string('medical_center')->nullable()->change();
            $table->string('job_designation')->nullable()->change();

            
            
            
            
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
            $table->string('middle_name')->nullable(false)->change();
            $table->string('first_lang')->nullable(false)->change();
            $table->string('country_of_citizenship')->nullable(false)->change();
            $table->string('nationality')->nullable(false)->change();
            $table->string('passport_num')->nullable(false)->change();
            $table->string('nid_num')->nullable(false)->change();
            $table->string('marital_status')->nullable(false)->change();
            $table->string('gender')->nullable(false)->change();
            $table->string('address')->nullable(false)->change();
            $table->string('city')->nullable(false)->change();
            $table->string('country')->nullable(false)->change();
            $table->string('state_province')->nullable(false)->change();
            $table->string('zip')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->string('organization_category')->nullable(false)->change();
            $table->string('company')->nullable(false)->change();
            $table->string('medical_center')->nullable(false)->change();
            $table->string('job_designation')->nullable(false)->change();
        });
    }
};
