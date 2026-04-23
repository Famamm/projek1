<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Log extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'user_id',
        'activity',
        'description',
        'ajuan_cuti_keagamaan_id',
        'ajuan_cuti_semester_id',
        'ajuan_kegiatan_kampus_id',
        'ajuan_kegiatan_mandiri_id',
        'ajuan_urgent_id',
        'ajuan_extend_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function ajuanCutiKeagamaan(): BelongsTo
    {
        return $this->belongsTo(AjuanCutiKeagamaan::class, 'ajuan_cuti_keagamaan_id');
    }

    public function ajuanCutiSemester(): BelongsTo
    {
        return $this->belongsTo(AjuanCutiSemester::class, 'ajuan_cuti_semester_id');
    }

    public function ajuanCutiKampus(): BelongsTo
    {
        return $this->belongsTo(AjuanCutiKampus::class, 'ajuan_kegiatan_kampus_id');
    }

    public function ajuanMandiri(): BelongsTo
    {
        return $this->belongsTo(AjuanMandiri::class, 'ajuan_kegiatan_mandiri_id');
    }

    public function ajuanUrgent(): BelongsTo
    {
        return $this->belongsTo(AjuanUrgent::class, 'ajuan_urgent_id');
    }

    public function ajuanExtend(): BelongsTo
    {
        return $this->belongsTo(AjuanExtend::class, 'ajuan_extend_id');
    }
}
