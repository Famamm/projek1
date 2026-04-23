<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'npk',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function verifikasiCutiKeagamaan(): HasMany
    {
        return $this->hasMany(AjuanCutiKeagamaan::class);
    }

    public function verifikasiCutiSemester(): HasMany
    {
        return $this->hasMany(AjuanCutiSemester::class);
    }

    public function verifikasiCutiKampus(): HasMany
    {
        return $this->hasMany(AjuanCutiKampus::class);
    }

    public function verifikasiMandiri(): HasMany
    {
        return $this->hasMany(AjuanMandiri::class);
    }

    public function verifikasiExtend(): HasMany
    {
        return $this->hasMany(AjuanExtend::class);
    }

    public function verifikasiUrgent(): HasMany
    {
        return $this->hasMany(AjuanUrgent::class);
    }
}
