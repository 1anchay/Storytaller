<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameCase extends Model
{
    use HasFactory;

    // Указываем, какие поля можно массово заполнять
    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];
}
