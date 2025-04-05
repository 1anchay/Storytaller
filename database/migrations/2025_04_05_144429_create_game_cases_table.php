<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('game_cases', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);  // Ограничиваем длину имени до 255 символов
            $table->text('description');  // Используем текст для описания, так как оно может быть длинным
            $table->decimal('price', 8, 2);  // Цена с двумя знаками после запятой
            $table->string('image', 255);  // Ограничиваем длину имени изображения до 255 символов
            $table->timestamps();  // Столбцы для временных меток
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_cases');
    }
};
