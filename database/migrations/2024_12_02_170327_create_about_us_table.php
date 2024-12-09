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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Title
            $table->text('description')->nullable(); // Description
            $table->string('image_1')->nullable(); // Image 1 (file path or URL)
            $table->string('image_2')->nullable(); // Image 2 (file path or URL)
            $table->string('video_1')->nullable(); // Video 1 (file path or URL)
            $table->integer('numbers')->nullable(); // Numbers
            $table->string('icon_1')->nullable(); // Icon 1
            $table->text('desc_1')->nullable(); // Description 1
            $table->string('video_2')->nullable(); // Video 2 (file path or URL)
            $table->string('title_2')->nullable(); // Title 2
            $table->text('desc_2')->nullable(); // Description 2
            $table->timestamps(); // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
