<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KurikulumVersion extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'kode', 'tahun_mulai', 'tahun_selesai',
        'deskripsi', 'is_active', 'is_default',
    ];

    // Jika nanti ingin relasi ke MataPelajaran atau CapaianPembelajaran
    public function mataPelajarans()
    {
        return $this->hasMany(MataPelajaran::class);
    }
}
