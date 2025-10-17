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
        Schema::create('gigs', function (Blueprint $table) {
            $table->id('G_id');
            // $table->integer('FS_id')->unsigned();
            $table->unsignedBigInteger('FS_id');
            $table->unsignedBigInteger('FCat_id');
            $table->string('G_title');
            $table->string('G_description', length: 900);
            // $table->string('G_status');
            $table->string('G_image');
            $table->string('G_price');
            $table->timestamps();
            $table->foreign('FS_id')->references('FS_id')->on('freelanceSellers')->onDelete('cascade');
            $table->foreign('FCat_id')->references('FCat_id')->on('CourseCategory')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gigs');
    }
};
