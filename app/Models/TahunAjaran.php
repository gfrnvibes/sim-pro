<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Prestasi;
use App\Models\ProjekPenguatanProfil;
use App\Models\SiswaExtrakurikuler;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TahunAjaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'semester', 'is_active', 'mulai', 'selesai',
    ];

    public function kelas()
    {
        return $this->hasMany(Kelas::class);
    }

    public function siswaKelas()
    {
        return $this->hasMany(SiswaKelas::class);
    }

    public function projekPenguatanProfil()
    {
        return $this->hasMany(ProjekPenguatanProfil::class);
    }

    public function prestasi()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function siswaEkstrakurikuler()
    {
        return $this->hasMany(SiswaExtrakurikuler::class);
    }
}
