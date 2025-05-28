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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('title_en')->nullable(); // About Us title
            $table->string('title_ar')->nullable(); // About Us title

            $table->text('description_en')->nullable(); // Description of the about us section
            $table->text('description_ar')->nullable(); // Description of the about us section

            $table->string('image')->nullable();
            $table->json('images')->nullable(); // For storing multiple image paths as JSON


            $table->string('features_en')->nullable();
            $table->string('features_ar')->nullable();

            $table->string('benefits_en')->nullable();
            $table->string('benefits_ar')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
