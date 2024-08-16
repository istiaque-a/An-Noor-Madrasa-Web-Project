<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovedColumnInTeacherStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teacher_staff', function (Blueprint $table) {
             $table->enum('approved',[0,1])->default(0)->after('email')->comment('0=> Not Approved, 1=> Approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('teacher_staff', function (Blueprint $table) {
            $table->dropColumn('approved');
        });
    }
}
