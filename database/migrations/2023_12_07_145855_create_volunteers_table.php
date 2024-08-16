<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            
            $table->integer('user_id');
            $table->integer('user_type');
            
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();

            $table->string('temporary_address')->nullable();
            $table->string('profession')->nullable();
            

                
            $table->string('mobile_own')->nullable();
            $table->string('email')->nullable();
            $table->string('whatsapp')->nullable();
            
            $table->string('age')->nullable();
            $table->string('educational_institution')->nullable();
            $table->string('current_working_institution')->nullable();
            
            $table->string('skill_experience')->nullable();

                
                
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
        Schema::dropIfExists('volunteers');
    }
}
