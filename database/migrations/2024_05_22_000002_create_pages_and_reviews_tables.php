<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Статикалык барактар үчүн (О нас, Контакты)
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique(); // about, contacts
            $table->json('title'); // JSON: {"ru": "О нас", "en": "About us"}
            $table->json('content'); // JSON: Текст
            $table->string('image_url')->nullable();
            $table->timestamps();
        });

        // Отзывтар үчүн
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('author_name');
            $table->string('author_country')->nullable();
            $table->json('text'); // JSON: Эгер отзывду которгуңуз келсе
            $table->integer('rating')->default(5);
            $table->string('avatar_url')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
        Schema::dropIfExists('pages');
    }
};
