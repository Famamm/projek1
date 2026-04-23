<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Province;
use Laravolt\Indonesia\Models\Village;

class Mahasiswa extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'campus_id',
        'jurusan_id',
        'nik',
        'npp',
        'alamat',
        'ig',
        'fb',
        'thread',
        'province_id',
        'city_id',
        'district_id',
        'village_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    public function jurusan(): BelongsTo
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function province(): BelongsTo
    {
        return $this->belongsTo(Province::class, 'province_id', 'code');
    }

    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class, 'city_id', 'code');
    }

    public function district(): BelongsTo
    {
        return $this->belongsTo(District::class, 'district_id', 'code');
    }

    public function village(): BelongsTo
    {
        return $this->belongsTo(Village::class, 'village_id', 'code');
    }

    public function ajuanCutiKeagamaan(): HasMany
    {
        return $this->hasMany(AjuanCutiKeagamaan::class);
    }

    public function ajuanCutiSemester(): HasMany
    {
        return $this->hasMany(AjuanCutiSemester::class);
    }

    public function ajuanCutiKampus(): HasMany
    {
        return $this->hasMany(AjuanCutiKampus::class);
    }

    public function ajuanMandiri(): HasMany
    {
        return $this->hasMany(AjuanMandiri::class);
    }

    public function ajuanExtend(): HasMany
    {
        return $this->hasMany(AjuanExtend::class);
    }

    public function ajuanUrgent(): HasMany
    {
        return $this->hasMany(AjuanUrgent::class);
    }
}
