<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMadrashahUserFieldsInUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('father_name')->after('password')->nullable();
            $table->string('rank')->after('father_name')->nullable();
            $table->string('permanent_address')->after('rank')->nullable();
            $table->string('permanent_address_village')->after('permanent_address')->nullable();
            $table->string('permanent_address_post_office')->after('permanent_address_village')->nullable();
            $table->string('permanent_address_thana')->after('permanent_address_post_office')->nullable();
            $table->string('permanent_address_district')->after('permanent_address_thana')->nullable();
            $table->string('permanent_address_division')->after('permanent_address_district')->nullable();

            $table->string('temporary_address')->after('permanent_address_division')->nullable();
            $table->string('khidmat_year')->after('temporary_address')->nullable();
            $table->enum('ex_or_current',['Ex','Current'])->after('khidmat_year')->nullable();
            $table->enum('marital_status',['Married','Unmarried'])->after('ex_or_current')->nullable();
            $table->string('facebook_id')->after('marital_status')->nullable();
            $table->string('faragat_year_hijri')->after('facebook_id')->nullable();
            $table->string('faragat_year_christian')->after('faragat_year_hijri')->nullable();
            $table->string('blood_group',5)->after('faragat_year_christian');
            $table->string('last_jamat_attended')->after('blood_group');
            $table->string('mobile_own')->after('last_jamat_attended');
            $table->string('mobile_guardian')->after('mobile_own');
            $table->string('mashgala_workplaces')->after('mobile_guardian')->nullable();
            $table->text('tasnif')->after('mashgala_workplaces')->nullable();
            $table->string('social_organizational_contribution')->after('tasnif')->nullable();
            $table->string('profession')->after('social_organizational_contribution')->nullable();
            $table->enum('donation_type',['Monthly','Yearly'])->after('profession')->nullable();
            $table->double('donation_amount')->after('donation_type')->default(0);
            $table->string('donation_fields')->after('donation_amount')->nullable();


            $table->string('current_working_institution')->after('khidmat_year')->nullable();
            $table->string('whatsapp')->after('current_working_institution')->nullable();
            
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
            //
        });
    }
}
