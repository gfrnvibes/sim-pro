<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\PenilaianProjek;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProjekPenguatanProfil extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kelas_id', 'tahun_ajaran_id', 'tema', 'deskripsi', 'semester',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function penilaianProjek()
    {
        return $this->hasMany(PenilaianProjek::class, 'projek_id');
    }
}
