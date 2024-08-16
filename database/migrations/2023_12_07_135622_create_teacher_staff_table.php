<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_staff', function (Blueprint $table) {
            $table->id();

            $table->string('user_id');
            $table->string('name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('rank')->nullable();
          
            
            $table->string('permanent_address')->nullable();
            $table->string('temporary_address')->nullable();
            $table->string('khidmat_year')->nullable();
            $table->string('ex_or_current')->nullable();

            
            $table->string('current_working_institution')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('email')->nullable();
            
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
        Schema::dropIfExists('teacher_staff');
    }
}
