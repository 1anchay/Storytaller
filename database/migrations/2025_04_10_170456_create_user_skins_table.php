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
        Schema::create('user_skins', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained(); // Связь с таблицей users
            $table->foreignId('skin_id')->constrained(); // Связь с таблицей skins
            $table->string('status')->default('inventory'); // Статус предмета
            $table->timestamps(); // created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_skins');
    }
};