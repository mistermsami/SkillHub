<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('freelancejobs', function (Blueprint $table) {
            $table->id('J_id'); // This is already unsigned by default with the `id()` method.
            $table->unsignedBigInteger('FB_id'); // `unsignedBigInteger` for foreign key reference
            $table->string('J_title');
            $table->string('J_description', 900); // Corrected the length syntax
            $table->string('J_budget');
            $table->string('J_status');
            $table->timestamps();

            // Define the foreign key relationship
            $table->foreign('FB_id')->references('FB_id')->on('freelance_buyers')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
