<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AjuanCutiSemester extends Model
{
    use HasFactory;

    /**
     * @var list<string>
     */
    protected $fillable = [
        'mahasiswa_id',
        'tanggal_ajuan',
        'tujuan',
        'alamat_tujuan',
        'tanggal_berangkat',
        'tanggal_kembali',
        'contact_person',
        'sptjm',
        'krs',
        'pengasuh_id',
        'pengelola_id',
        'admin_id',
        'verifikasi_pengasuh',
        'verifikasi_pengelola',
        'verifikasi_admin',
        'bukti_verifikasi',
        'status',
        'jenis',
    ];

    /**
     * @var array<string, string>
     */
    protected $casts = [
        'tanggal_ajuan' => 'datetime',
        'tanggal_berangkat' => 'datetime',
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

    public function logs(): HasMany
    {
        return $this->hasMany(Log::class, 'ajuan_cuti_semester_id');
    }
}
