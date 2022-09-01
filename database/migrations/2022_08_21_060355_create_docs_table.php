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
        Schema::create('docs', function (Blueprint $table) {
            $table->id();
            $table->string('description')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('large_image')->nullable();
            $table->string('pdf_doc')->nullable();
            $table->integer('user_id');
            $table->smallInteger('doc_category')->comment('1=>passport_size_photo , 2=>nid_photo , 3=>Calling Photo , 4=> Flight photo , 5=> Medical Photo, 6=> Passport Copy , 7 => Visa/Stamping Photo, 8=> Working Selection');
            $table->integer('done_by');
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
        Schema::dropIfExists('docs');
    }
};
