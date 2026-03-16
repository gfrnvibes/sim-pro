<?php

namespace App\Models;

use App\Models\MataPelajaran;
use App\Models\PenilaianSiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CapaianPembelajaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'mata_pelajaran_id', 'fase', 'elemen', 'sub_elemen', 'deskripsi_cp', 'tahun_ajaran_start',
    ];

    public function mataPelajaran()
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function penilaianSiswas()
    {
        return $this->hasMany(PenilaianSiswa::class);
    }
}
