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
        Schema::create('foundation_committee_details', function (Blueprint $table) {
            $table->id();
            $table->integer('foundation_committee_id');
            $table->string('member_name');
            $table->string('position');
            $table->string('address');
            $table->string('educational_qualification')->nullable();
            $table->string('mobile');
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('foundation_committee_details');
    }
};
