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
        Schema::create('skins', function (Blueprint $table) {
            $table->id();
            $table->string('name');          // Название скина
            $table->string('image');         // Путь к изображению
            $table->string('rarity');        // Редкость (исправлена опечатка "rarity" вместо "rarity")
            $table->integer('price');        // Цена в рублях
            $table->timestamps();            // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skins');
    }
};