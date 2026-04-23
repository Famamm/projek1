<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campus extends Model
{
    use HasFactory;

    protected $table = 'campuses';

    /**
     * @var list<string>
     */
    protected $fillable = [
        'name',
    ];

    public function jurusans(): HasMany
    {
        return $this->hasMany(Jurusan::class);
    }

    public function mahasiswas(): HasMany
    {
        return $this->hasMany(Mahasiswa::class);
    }
}
