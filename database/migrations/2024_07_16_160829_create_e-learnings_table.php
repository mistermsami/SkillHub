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
        Schema::create('eLearnings', function (Blueprint $table) {
            $table->id('EL_id');
            $table->integer('GU_id')->unsigned();
            $table->timestamps();
            $table->foreign('GU_id')->references('GU_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('eLearnings');
    }

};
