<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatestWorksTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('latest_works', function (Blueprint $table) {
            $table->id();
            
            // Replacing foreignId with enum for category
            $table->enum('category', ['interior', 'exterior'])
                  ->comment('1: Interior, 2: Exterior');
            
            $table->string('title');
            $table->text('description');
            $table->string('image_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('latest_works');
    }
}