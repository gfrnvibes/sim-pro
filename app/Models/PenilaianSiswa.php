<?php

namespace App\Models;

use App\Models\CapaianPembelajaran;
use App\Models\Kelas;
use App\Models\MataPelajaran;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class PenilaianSiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'penilaian_siswas';

    protected $fillable = [
        'siswa_kelas_id',
        'capaian_pembelajaran_id',
        'mata_pelajaran_id',
        'jenis_penilaian',
        'nilai',
        'predikat',
        'deskripsi',
        'semester',
        'created_by',
    ];

    protected $casts = [
        'nilai'         => 'decimal:2',
        'semester'      => 'integer',
        'created_by'    => 'integer',
    ];

    // --------------------------------------------------
    // Relasi
    // --------------------------------------------------

    public function capaianPembelajaran(): BelongsTo
    {
        return $this->belongsTo(CapaianPembelajaran::class);
    }

    public function mataPelajaran(): BelongsTo
    {
        return $this->belongsTo(MataPelajaran::class);
    }

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Akses langsung ke siswa & kelas melalui siswa_kelas
    public function siswa()
    {
        return $this->hasOneThrough(
            Siswa::class,
            SiswaKelas::class,
            'id',
            'id',
            'siswa_kelas_id',
            'siswa_id'
        );
    }

    public function kelas()
    {
        return $this->hasOneThrough(
            Kelas::class,
            SiswaKelas::class,
            'id',
            'id',
            'siswa_kelas_id',
            'kelas_id'
        );
    }

    public function siswaKelas(): BelongsTo
    {
        return $this->belongsTo(SiswaKelas::class);
    }

    // --------------------------------------------------
    // Scope
    // --------------------------------------------------

    public function scopeSemester($query, int $semester)
    {
        return $query->where('semester', $semester);
    }

    public function scopeJenis($query, string $jenis)
    {
        return $query->where('jenis_penilaian', $jenis);
    }

    public function scopeMataPelajaran($query, $mapelId)
    {
        return $query->where('mata_pelajaran_id', $mapelId);
    }

    public function scopeCapaian($query, $capaianId)
    {
        return $query->where('capaian_pembelajaran_id', $capaianId);
    }

    public function scopeSiswaKelas($query, $siswaKelasId)
    {
        return $query->where('siswa_kelas_id', $siswaKelasId);
    }

    // --------------------------------------------------
    // Accessor / Helper
    // --------------------------------------------------

    public function getPredikatOtomatisAttribute(): ?string
    {
        if (!$this->nilai) return null;

        if ($this->nilai >= 90) return 'SB';   // Sangat Baik
        if ($this->nilai >= 80) return 'B';    // Baik
        if ($this->nilai >= 70) return 'C';    // Cukup
        return 'K';                            // Kurang
    }

    public function getNilaiAkhirFormattedAttribute(): string
    {
        return $this->nilai ? number_format($this->nilai, 2) : '-';
    }

    public function getDeskripsiSingkatAttribute(): string
    {
        return $this->deskripsi ? substr($this->deskripsi, 0, 80) . '...' : '-';
    }
}
