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
    Schema::table('users', function (Blueprint $table) {
        $table->uuid('uuid')->nullable()->after('id');
    });
    
    // Для существующих записей
    \App\Models\User::all()->each->update(['uuid' => Str::uuid()]);
    
    Schema::table('users', function (Blueprint $table) {
        $table->uuid('uuid')->nullable(false)->change();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
