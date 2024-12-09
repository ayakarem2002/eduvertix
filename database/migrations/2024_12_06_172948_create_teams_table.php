<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('teams', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable(); // Image column for team member
            $table->string('title'); // Title column
            $table->string('job_title'); // Job title column
            $table->string('facebook')->nullable(); // Facebook URL
            $table->string('twitter')->nullable(); // Twitter URL
            $table->string('instagram')->nullable(); // Instagram URL
            $table->string('linkedin')->nullable(); // LinkedIn URL
            $table->timestamps();
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teams');
    }
};
