<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // 1. Тилдер (Languages) - Админкадан башкаруу үчүн
        Schema::create('languages', function (Blueprint $table) {
            $table->id();
            $table->string('code')->unique(); // ru, en, kg
            $table->string('name'); // Русский, English
            $table->boolean('is_active')->default(false); // Сайтта көрүнөбү?
            $table->boolean('is_default')->default(false); // Демейки тилби?
            $table->timestamps();
        });

        // 2. Жөндөөлөр (Settings) - Көп тилдүү маанилер үчүн
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique();
            $table->json('value')->nullable(); // JSON: {"ru": "...", "en": "..."}
            $table->timestamps();
        });

        // 3. Багыттар (Directions)
        Schema::create('directions', function (Blueprint $table) {
            $table->id();
            $table->json('name'); // JSON
            $table->string('slug')->unique();
            $table->json('description'); // JSON
            $table->string('image_url')->nullable();
            $table->timestamps();
        });

        // 4. Турлар (Tours)
        Schema::create('tours', function (Blueprint $table) {
            $table->id();
            $table->foreignId('direction_id')->constrained()->onDelete('cascade');
            $table->json('name'); // JSON
            $table->string('slug')->unique();
            $table->json('description'); // JSON
            $table->json('short_description')->nullable(); // JSON
            $table->string('hero_image')->nullable();
            $table->decimal('price', 10, 2);
            $table->json('duration'); // JSON: {"ru": "4 дня", "en": "4 days"}
            $table->json('difficulty'); // JSON
            $table->json('group_size'); // JSON
            $table->timestamps();
        });

        // 5. Турдун маршруту (Itineraries)
        Schema::create('tour_itineraries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->string('day_number'); // 1, 2, 3 (сан бойдон калат)
            $table->json('title'); // JSON
            $table->json('description'); // JSON
            $table->timestamps();
        });

        // 6. Турдун галереясы (Сүрөттөр которулбайт)
        Schema::create('tour_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tour_id')->constrained()->onDelete('cascade');
            $table->string('image_url');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tour_images');
        Schema::dropIfExists('tour_itineraries');
        Schema::dropIfExists('tours');
        Schema::dropIfExists('directions');
        Schema::dropIfExists('settings');
        Schema::dropIfExists('languages');
    }
};
