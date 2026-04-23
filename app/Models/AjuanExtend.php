<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class AjuanExtend extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'mahasiswa_id',
        'extend_for',
        'id_ajuan',
        'tanggal_kembali',
        'kendaraan',
        'contact_person',
        'sptjm',
        'pengasuh_id',
        'pengelola_id',
        'admin_id',
        'verifikasi_pengasuh',
        'verifikasi_pengelola',
        'verifikasi_admin',
        'bukti_konfirmasi',
        'bukti_extend',
        'status',
        'jenis',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_kembali' => 'datetime',
        'verifikasi_pengasuh' => 'date',
        'verifikasi_pengelola' => 'date',
        'verifikasi_admin' => 'date',
    ];

    public function mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class);
    }

    public function pengasuh(): BelongsTo
    {
        return $this->belongsTo(Pengasuh::class);
    }

    public function pengelola(): BelongsTo
    {
        return $this->belongsTo(Pengelola::class);
    }

    public function admin(): BelongsTo
    {
        return $this->belongsTo(Admin::class);
    }

    public function extendable(): MorphTo
    {
        return $this->morphTo(__FUNCTION__, 'extend_for', 'id_ajuan');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class, 'ajuan_extend_id');
    }
}
