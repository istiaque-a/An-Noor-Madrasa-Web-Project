<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFujalasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fujala', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');    
            $table->integer('user_type');
            $table->String('name')->nullable();
            $table->String('father_name')->nullable();

            $table->string('dob')->nullable();
            $table->string('mobile_own')->nullable();
            $table->string('permanent_address_village')->nullable();

            $table->string('permanent_address_post_office')->nullable();
            $table->string('permanent_address_thana')->nullable();
            $table->string('permanent_address_district')->nullable();
            $table->string('permanent_address_division')->nullable();
            $table->string('temporary_address')->nullable();

            $table->string('marital_status')->nullable();
            $table->string('mashgala_workplaces')->nullable();
            $table->string('facebook_id')->nullable();

            $table->string('faragat_year_hijri')->nullable();
            $table->string('faragat_year_christian')->nullable();
            $table->string('blood_group')->nullable();

            $table->string('last_jamat_attended')->nullable();
            $table->string('email')->nullable();

            $table->string('mobile_guardian')->nullable();
            $table->string('whatsapp')->nullable();
            
            $table->string('tasnif')->nullable();
            $table->string('social_organizational_contribution')->nullable();
                
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fujalas');
    }
}
