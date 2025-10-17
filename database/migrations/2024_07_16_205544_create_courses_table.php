<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->id('C_id');
            $table->string('FS_id');
            $table->string('C_title');
            $table->string('C_description');
            $table->string('C_image');
            $table->string('C_price');
            $table->integer('CC_id')->unsigned();
            $table->timestamps();
            $table->foreign('FS_id')->references('FS_id')->on('freelanceSellers')->onDelete('cascade');
            $table->foreign('CC_id')->references('CC_id')->on('course_categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
