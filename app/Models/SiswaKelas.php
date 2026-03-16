<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Ketidakhadiran;
use App\Models\PenilaianProjek;
use App\Models\PenilaianSiswa;
use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiswaKelas extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'siswa_kelas';

    protected $fillable = [
        'siswa_id',
        'kelas_id',
        'tahun_ajaran_id',
        'no_absen',
        'status',
    ];

    protected $casts = [
        'status' => 'string', // atau bisa pakai enum jika Laravel versi mendukung
    ];

    // Relasi ke Siswa
    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    // Relasi ke Kelas
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    // Relasi ke Tahun Ajaran
    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    // Relasi ke Penilaian Siswa (nilai rapor, capaian, dll.)
    public function penilaianSiswas()
    {
        return $this->hasMany(PenilaianSiswa::class);
    }

    // Relasi ke Ketidakhadiran (absensi)
    public function ketidakhadirans()
    {
        return $this->hasMany(Ketidakhadiran::class);
    }

    // Relasi ke Penilaian Projek (jika projek diikat per siswa di kelas tertentu)
    public function penilaianProjek()
    {
        return $this->hasMany(PenilaianProjek::class);
    }

    // Contoh scope: hanya siswa yang masih aktif di kelas ini
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    // Contoh accessor: nama lengkap + nomor absen
    public function getNamaAbsenAttribute()
    {
        return $this->siswa->nama_lengkap . ' (' . ($this->no_absen ?? '-') . ')';
    }

    // Contoh method helper: apakah siswa ini aktif di tahun ajaran tertentu?
    public function isAktifDiTahunAjaran($tahunAjaranId)
    {
        return $this->tahun_ajaran_id == $tahunAjaranId && $this->status === 'Aktif';
    }
}
