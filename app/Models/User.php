<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'role',
        'balance', // Добавляем баланс
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'balance' => 'decimal:2', // Указываем тип для баланса
    ];

    protected $appends = [
        'profile_photo_url', // Добавляем accessor в JSON-представление
    ];

    /**
     * Отношение "один ко многим" с транзакциями.
     */
    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * Accessor для URL фото профиля.
     */
    public function getProfilePhotoUrlAttribute()
    {
        if ($this->profile_photo_path) {
            return Storage::url($this->profile_photo_path);
        }

        return 'https://www.gravatar.com/avatar/'.md5(strtolower(trim($this->email))).'?d=identicon&s=200';
    }

    /**
     * Обновление баланса пользователя.
     *
     * @param float $amount Сумма для изменения
     * @param string $type Тип операции (deposit, withdrawal)
     * @param string|null $description Описание операции
     * @return $this
     * @throws \RuntimeException
     */
    public function updateBalance(float $amount, string $type = 'deposit', string $description = null)
    {
        // Проверка на отрицательный баланс при списании
        if ($amount < 0 && abs($amount) > $this->balance) {
            throw new \RuntimeException('Недостаточно средств на балансе');
        }

        $balanceBefore = $this->balance;
        $this->balance += $amount;
        $this->save();

        // Создаем запись о транзакции
        $this->transactions()->create([
            'amount' => $amount,
            'type' => $type,
            'status' => 'completed',
            'description' => $description ?? ($amount > 0 ? 'Пополнение баланса' : 'Списание средств'),
            'balance_before' => $balanceBefore,
            'balance_after' => $this->balance,
        ]);

        return $this;
    }

    /**
     * Проверка, является ли пользователь администратором.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}