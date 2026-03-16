<?php

namespace App\Models;

use App\Models\Kelas;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ketidakhadiran extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ketidakhadirans';

    protected $fillable = [
        'siswa_kelas_id',
        'tanggal',
        'jenis',
        'keterangan',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'jenis'   => 'string',
    ];

    /**
     * Relasi ke data siswa di kelas tertentu (pivot)
     */
    public function siswaKelas(): BelongsTo
    {
        return $this->belongsTo(SiswaKelas::class);
    }

    /**
     * Relasi langsung ke siswa (melalui siswa_kelas)
     */
    public function siswa()
    {
        return $this->hasOneThrough(
            Siswa::class,
            SiswaKelas::class,
            'id',           // Foreign key di siswa_kelas
            'id',           // Foreign key di siswas
            'siswa_kelas_id',
            'siswa_id'
        );
    }

    /**
     * Relasi ke kelas (melalui siswa_kelas)
     */
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

    /**
     * Relasi ke tahun ajaran (melalui siswa_kelas)
     */
    public function tahunAjaran()
    {
        return $this->hasOneThrough(
            TahunAjaran::class,
            SiswaKelas::class,
            'id',
            'id',
            'siswa_kelas_id',
            'tahun_ajaran_id'
        );
    }

    // ---------------- Scope ----------------

    /**
     * Scope untuk absensi pada tanggal tertentu
     */
    public function scopeTanggal($query, $tanggal)
    {
        return $query->whereDate('tanggal', $tanggal);
    }

    /**
     * Scope untuk jenis ketidakhadiran tertentu
     */
    public function scopeJenis($query, string $jenis)
    {
        return $query->where('jenis', $jenis);
    }

    /**
     * Scope untuk absensi di semester tertentu (berdasarkan tahun ajaran)
     */
    public function scopeSemester($query, int $semester, $tahunAjaranId = null)
    {
        $query = $query->whereHas('siswaKelas', function ($q) use ($semester, $tahunAjaranId) {
            $q->where('tahun_ajaran_id', $tahunAjaranId ?? TahunAjaran::where('is_active', true)->first()?->id);
        });

        // Filter tanggal berdasarkan semester (asumsi semester 1: Juli-Des, semester 2: Jan-Jun)
        if ($semester === 1) {
            $query->whereMonth('tanggal', '>=', 7)
                  ->whereMonth('tanggal', '<=', 12);
        } else {
            $query->whereMonth('tanggal', '>=', 1)
                  ->whereMonth('tanggal', '<=', 6);
        }

        return $query;
    }

    /**
     * Scope untuk absensi siswa tertentu
     */
    public function scopeSiswa($query, $siswaId)
    {
        return $query->whereHas('siswaKelas', fn($q) => $q->where('siswa_id', $siswaId));
    }

    // ---------------- Accessor ----------------

    /**
     * Label jenis ketidakhadiran yang lebih ramah tampilan
     */
    public function getJenisLabelAttribute(): string
    {
        $labels = [
            'Sakit'      => 'Sakit',
            'Izin'       => 'Izin',
            'Alpha'      => 'Tanpa Keterangan',
            'Terlambat'  => 'Terlambat',
        ];

        return $labels[$this->jenis] ?? ucfirst($this->jenis);
    }

    /**
     * Apakah absen ini termasuk kategori "tidak hadir" (bukan hanya terlambat)
     */
    public function getIsTidakHadirAttribute(): bool
    {
        return in_array($this->jenis, ['Sakit', 'Izin', 'Alpha']);
    }
}
