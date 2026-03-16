<?php

namespace App\Models;

use App\Models\ProjekPenguatanProfil;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'tahun_ajaran_id', 'nama_kelas', 'tingkat', 'wali_kelas_id',
    ];

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    public function waliKelas()
    {
        return $this->belongsTo(User::class, 'wali_kelas_id');
    }

    public function siswaKelas()
    {
        return $this->hasMany(SiswaKelas::class);
    }

    public function siswaAktif()
    {
        return $this->hasMany(SiswaKelas::class)
            ->where('status', 'Aktif');
    }

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_kelas')
            ->withPivot('tahun_ajaran_id', 'no_absen', 'status')
            ->withTimestamps();
    }

    public function projekPenguatanProfil()
    {
        return $this->hasMany(ProjekPenguatanProfil::class);
    }
}
