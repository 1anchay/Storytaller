<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'profile_photo_path',
        'role',
        'balance',
        'last_login_at',
        'last_login_ip',
        'uuid',
        'is_active',
        'locale',
    ];

    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'password' => 'hashed',
        'balance' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    protected $appends = [
        'profile_photo_url',
        'initials',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->uuid = Str::uuid()->toString();
            $user->is_active = $user->is_active ?? true;
        });
    }

    public function hasVerifiedEmail(): bool
    {
        return !is_null($this->email_verified_at);
    }

    public function getProfilePhotoUrlAttribute(): string
    {
        if ($this->profile_photo_path) {
            if (filter_var($this->profile_photo_path, FILTER_VALIDATE_URL)) {
                return $this->profile_photo_path;
            }
            
            if (Storage::disk('public')->exists($this->profile_photo_path)) {
                return Storage::disk('public')->url($this->profile_photo_path);
            }
            
            \Log::warning("Profile photo not found for user {$this->id}: {$this->profile_photo_path}");
        }
        
        return $this->defaultProfilePhotoUrl();
    }

    protected function defaultProfilePhotoUrl(): string
    {
        $name = trim(collect(explode(' ', $this->name))->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })->join(' '));

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    public function getInitialsAttribute(): string
    {
        return collect(explode(' ', $this->name))
            ->map(fn ($name) => mb_substr($name, 0, 1, 'UTF-8'))
            ->take(2)
            ->join('')
            ->upper();
    }

    public function updateBalance(float $amount, string $type = 'deposit', ?string $description = null): self
    {
        if ($type === 'withdrawal' && !$this->hasSufficientBalance($amount)) {
            throw new \RuntimeException('Insufficient funds');
        }

        return \DB::transaction(function () use ($amount, $type, $description) {
            $balanceBefore = $this->balance;
            $this->balance += ($type === 'deposit') ? $amount : -$amount;
            $this->save();

            $this->transactions()->create([
                'amount' => $amount,
                'type' => $type,
                'status' => 'completed',
                'description' => $description ?? $this->getDefaultTransactionDescription($type),
                'balance_before' => $balanceBefore,
                'balance_after' => $this->balance,
                'ip_address' => request()->ip(),
            ]);

            return $this;
        });
    }

    protected function getDefaultTransactionDescription(string $type): string
    {
        return match($type) {
            'deposit' => 'Пополнение баланса',
            'withdrawal' => 'Списание средств',
            'payment' => 'Оплата услуг',
            'refund' => 'Возврат средств',
            'bonus' => 'Бонусные средства',
            'penalty' => 'Штрафные санкции',
            default => 'Транзакция',
        };
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function hasSufficientBalance(float $amount): bool
    {
        return $this->balance >= $amount;
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function preferredLocale(): string
    {
        return $this->locale ?? config('app.locale');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class)->latest();
    }

    public function markEmailAsVerified(): bool
    {
        return $this->forceFill([
            'email_verified_at' => $this->freshTimestamp(),
        ])->save();
    }

    public function sendEmailVerificationNotification()
    {
        $this->notify(new \App\Notifications\VerifyEmail);
    }
}