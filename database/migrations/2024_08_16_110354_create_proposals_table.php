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
        Schema::create('proposals', function (Blueprint $table) {
            $table->id('P_id');
            $table->string('G_id')->unsignedBigInteger('G_id');
            $table->string('J_id')->unsignedBigInteger('J_id');
            $table->string('P_status');
            $table->string('P_coverletter', length: 1500);
            $table->integer('worksubmit')->nullable();
            $table->integer('rating')->nullable();
            $table->foreign('G_id')->references('G_id')->on('Gigss')->onDelete('cascade');
            $table->foreign('J_id')->references('J_id')->on('Jobs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proposals');
    }
};
