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
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('title')->unique();
            $table->enum('type', ['Anime', 'Drama', 'Manga', 'Light Novel']);
            $table->unsignedSmallInteger('year');
            $table->json('genres');
            $table->decimal('rating', 3, 1)->default(0);
            $table->unsignedSmallInteger('episodes')->nullable();
            $table->unsignedSmallInteger('chapters')->nullable();
            $table->unsignedSmallInteger('volumes')->nullable();
            $table->string('country')->nullable();
            $table->string('author')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media');
    }
};
