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
        Schema::table('donors', function (Blueprint $table) {
            $table->string('donor_type')->nullable()->after('temporary_address')->comment('0=> 313 life time donor member, 1=> Monthly Madrasah Donor member, 2=> Monthly Mosque Donor member, 3=> An Noor Foundation Donor Member');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('donors', function (Blueprint $table) {
               $table->dropColumn('donor_type');
        });
    }
};
