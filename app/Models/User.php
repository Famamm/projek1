<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    public const ROLE_SUPERADMIN = 'superadmin';
    public const ROLE_ADMIN = 'admin';
    public const ROLE_MAHASISWA = 'mahasiswa';
    public const ROLE_PENGASUH = 'pengasuh';
    public const ROLE_PENGELOLA = 'pengelola';
    public const ROLE_FRONTDESK = 'frontdesk';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'photo',
        'role',
        'password',
    ];

    /**
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function mahasiswa(): HasOne
    {
        return $this->hasOne(Mahasiswa::class);
    }

    public function pengasuh(): HasOne
    {
        return $this->hasOne(Pengasuh::class);
    }

    public function admin(): HasOne
    {
        return $this->hasOne(Admin::class);
    }

    public function pengelola(): HasOne
    {
        return $this->hasOne(Pengelola::class);
    }

    public function frontdesk(): HasOne
    {
        return $this->hasOne(Frontdesk::class);
    }

    public function hasRole(string $role): bool
    {
        return $this->role === $role;
    }

    public function isSuperadmin(): bool
    {
        return $this->role === self::ROLE_SUPERADMIN;
    }
}
