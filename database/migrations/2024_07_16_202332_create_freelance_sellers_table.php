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
        Schema::create('freelanceSellers', function (Blueprint $table) {
            $table->id('FS_id');
            $table->integer('GU_id')->unsigned();
            $table->string('FS_about', length:2000);
            $table->string('FS_role', length:400);
            $table->string('FS_hourlyrate');
            $table->string('FS_skills', length:500);
            $table->timestamps();
            $table->foreign('GU_id')->references('GU_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('freelanceSellers');
    }
};
