<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donors', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id');
            $table->integer('user_type');
                        
            $table->string('name')->nullable();
            $table->string('profession')->nullable();
            $table->string('current_working_institution')->nullable();

                
            $table->string('mobile_own')->nullable();
                
            $table->string('rank')->nullable();
            $table->string('temporary_address')->nullable();    
                
            $table->string('donation_type')->nullable();
                
            $table->string('donation_fields')->nullable();
            $table->double('donation_amount')->default(0);

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
        Schema::dropIfExists('donors');
    }
}
