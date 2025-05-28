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
        Schema::create('video_gallery', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('video_album_id'); // Foreign key to video_album

            $table->string('video_title_en')->nullable();
            $table->string('video_title_ar')->nullable();
            $table->string('video_thumbnail')->nullable();
            $table->json('youtube_links')->nullable();

            $table->timestamps();

            // Define foreign key constraint
            $table->foreign('video_album_id')
                ->references('id')->on('video_album')
                ->onDelete('cascade'); // Optional: cascade delete videos if album is deleted
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('video_gallery');
    }
};
