<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiswaExtrakurikuler extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'siswa_ekstrakurikulers';

    protected $fillable = [
        'siswa_id',
        'ekstrakurikuler_id',
        'tahun_ajaran_id',
        'semester',
        'jabatan',
        'status',
        'keterangan',
    ];

    protected $casts = [
        'semester' => 'integer',   // 1 atau 2, atau null jika tahunan
        'status'   => 'string',
    ];

    // --------------------------------------------------
    // Relasi
    // --------------------------------------------------

    /**
     * Siswa yang mengikuti ekstrakurikuler ini
     */
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class);
    }

    /**
     * Ekstrakurikuler yang diikuti
     */
    public function ekstrakurikuler(): BelongsTo
    {
        return $this->belongsTo(Extrakurikuler::class);
    }

    /**
     * Tahun ajaran saat mengikuti ekstrakurikuler
     */
    public function tahunAjaran(): BelongsTo
    {
        return $this->belongsTo(TahunAjaran::class);
    }

    // --------------------------------------------------
    // Scope
    // --------------------------------------------------

    /**
     * Hanya tampilkan yang masih aktif
     */
    public function scopeAktif($query)
    {
        return $query->where('status', 'Aktif');
    }

    /**
     * Filter berdasarkan semester tertentu
     */
    public function scopeSemester($query, ?int $semester = null)
    {
        if ($semester !== null) {
            return $query->where('semester', $semester);
        }
        return $query;
    }

    /**
     * Filter berdasarkan tahun ajaran tertentu
     */
    public function scopeTahunAjaran($query, $tahunAjaranId)
    {
        return $query->where('tahun_ajaran_id', $tahunAjaranId);
    }

    /**
     * Filter ekstrakurikuler wajib / pilihan / keagamaan / dll
     */
    public function scopeKategori($query, string $kategori)
    {
        return $query->whereHas('ekstrakurikuler', function ($q) use ($kategori) {
            $q->where('kategori', $kategori);
        });
    }

    // --------------------------------------------------
    // Accessor
    // --------------------------------------------------

    /**
     * Label status yang lebih ramah tampilan
     */
    public function getStatusLabelAttribute(): string
    {
        $labels = [
            'Aktif'       => 'Aktif',
            'Tidak Aktif' => 'Tidak Aktif',
            'Selesai'     => 'Selesai / Lulus',
        ];

        return $labels[$this->status] ?? ucfirst($this->status);
    }

    /**
     * Jabatan + nama ekstrakurikuler (untuk tampilan ringkas)
     */
    public function getJabatanEkskulAttribute(): string
    {
        $jabatan = $this->jabatan ? $this->jabatan . ' - ' : '';
        return $jabatan . $this->ekstrakurikuler?->nama ?? '-';
    }

    /**
     * Apakah ekstrakurikuler ini diikuti di semester ganjil/genap
     */
    public function getSemesterLabelAttribute(): string
    {
        if ($this->semester === 1) {
            return 'Ganjil';
        }
        if ($this->semester === 2) {
            return 'Genap';
        }
        return 'Tahunan';
    }
}
