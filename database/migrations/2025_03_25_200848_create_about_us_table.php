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
            $table->id(); // auto-incrementing primary key

            $table->text('about_us_description_en')->nullable(); // Description of the about us section
            $table->text('about_us_description_ar')->nullable(); // Description of the about us section

            $table->json('images')->nullable(); // For storing multiple image paths as JSON


            $table->text('goals_main_title_en')->nullable();
            $table->text('goals_main_title_ar')->nullable();

            $table->text('goals_title_en')->nullable();
            $table->text('goals_description_en')->nullable();
            $table->text('goals_title_ar')->nullable();
            $table->text('goals_description_ar')->nullable();

            /* Services Cards */
            $table->string('services_card_image')->nullable();
            $table->text('services_card_title_en')->nullable();
            $table->text('services_card_description_en')->nullable();
            $table->text('services_card_title_ar')->nullable();
            $table->text('services_card_description_ar')->nullable();


            $table->timestamps();
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
