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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->date('dob');
            $table->string('first_lang',40);
            $table->string('country_of_citizenship',40);
            $table->string('nationality',40);
            $table->string('passport_num',100);
            $table->date('passport_expiry_date');
            $table->string('nid_num',100);
            $table->enum('marital_status',['single','married']);
            $table->enum('gender',['male','female']);
            $table->text('address');
            $table->string('city',80);
            $table->string('country',80);
            $table->string('state_province',80);
            $table->string('zip',20);
            $table->string('phone',40);
            $table->string('organization_category',30);
            $table->string('company',30);
            $table->string('medical_center',40);
            $table->date('medical_date');
            $table->string('job_designation',40);
            $table->date('departure_date');
            $table->date('esd_to_reach');
            
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
