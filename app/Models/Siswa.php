<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Ketidakhadiran;
use App\Models\Mutasi;
use App\Models\OrangTua;
use App\Models\PenilaianSiswa;
use App\Models\Prestasi;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Siswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nis', 'nisn', 'nama_lengkap', 'nama_panggilan', 'jenis_kelamin',
        'tempat_lahir', 'tanggal_lahir', 'agama', 'alamat', 'rt_rw',
        'kelurahan', 'kecamatan', 'kabupaten', 'provinsi', 'kode_pos',
        'foto_path', 'golongan_darah', 'tinggi_badan', 'berat_badan',
        'jarak_rumah_ke_sekolah',
    ];

    public function orangTuas()
    {
        return $this->hasMany(OrangTua::class);
    }

    public function siswaKelas()
    {
        return $this->hasMany(SiswaKelas::class);
    }

    public function kelasAktif()
    {
        return $this->siswaKelas()
            ->where('status', 'Aktif')
            ->latest()
            ->with('kelas');
    }

    public function penilaianSiswas()
    {
        return $this->hasManyThrough(
            PenilaianSiswa::class,
            SiswaKelas::class,
            'siswa_id',
            'siswa_kelas_id',
            'id',
            'id'
        );
    }

    public function prestasis()
    {
        return $this->hasMany(Prestasi::class);
    }

    public function ekstrakurikulers()
    {
        return $this->belongsToMany(Extrakurikuler::class, 'siswa_ekstrakurikulers')
            ->withPivot('tahun_ajaran_id', 'semester', 'jabatan', 'status', 'keterangan')
            ->withTimestamps();
    }

    public function ekstrakurikulerAktif()
    {
        return $this->hasMany(SiswaExtrakurikuler::class)
            ->aktif()
            ->with('ekstrakurikuler');
    }

    public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }

    public function ketidakhadirans()
    {
        return $this->hasManyThrough(
            Ketidakhadiran::class,
            SiswaKelas::class,
            'siswa_id',
            'siswa_kelas_id',
            'id',
            'id'
        );
    }
}
