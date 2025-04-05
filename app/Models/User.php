<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Добавляем поле 'role' в $fillable
    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'role',  // Добавим роль
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    /**
     * Получить URL для фото профиля.
     */
    public function getProfilePhotoUrlAttribute()
    {
        // Если у пользователя есть фото, то возвращаем URL
        if ($this->profile_photo_path) {
            return Storage::url($this->profile_photo_path);
        }

        // Если фото нет, возвращаем URL по умолчанию (Gravatar)
        return 'https://www.gravatar.com/avatar/' . md5(strtolower(trim($this->email))) . '?d=identicon&s=200';
    }
}
