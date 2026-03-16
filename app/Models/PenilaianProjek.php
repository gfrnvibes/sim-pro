<?php

namespace App\Models;

use App\Models\ProjekPenguatanProfil;
use App\Models\Siswa;
use App\Models\SiswaKelas;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PenilaianProjek extends Model
{
    use HasFactory;

    protected $table = 'penilaian_projek';

    protected $fillable = [
        'projek_id',
        'siswa_kelas_id',
        'nilai',
        'deskripsi',
        'bukti',           // json atau array path file/link
    ];

    protected $casts = [
        'nilai'     => 'decimal:2',
        'bukti'     => 'array',     // atau 'json' tergantung versi Laravel
    ];

    // --------------------------------------------------
    // Relasi
    // --------------------------------------------------

    public function projek(): BelongsTo
    {
        return $this->belongsTo(ProjekPenguatanProfil::class, 'projek_id');
    }

    public function siswaKelas(): BelongsTo
    {
        return $this->belongsTo(SiswaKelas::class);
    }

    // Akses langsung ke siswa & projek tema
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

    public function temaProjekAttribute(): ?string
    {
        return $this->projek?->tema;
    }

    // --------------------------------------------------
    // Scope
    // --------------------------------------------------

    public function scopeProjek($query, $projekId)
    {
        return $query->where('projek_id', $projekId);
    }

    public function scopeSiswaKelas($query, $siswaKelasId)
    {
        return $query->where('siswa_kelas_id', $siswaKelasId);
    }

    // --------------------------------------------------
    // Accessor / Helper
    // --------------------------------------------------

    public function getNilaiFormattedAttribute(): string
    {
        return $this->nilai ? number_format($this->nilai, 2) : '-';
    }

    public function getBuktiCountAttribute(): int
    {
        return is_array($this->bukti) ? count($this->bukti) : 0;
    }

    public function getHasBuktiAttribute(): bool
    {
        return !empty($this->bukti);
    }

    public function getPredikatOtomatisAttribute(): ?string
    {
        if (!$this->nilai) return null;

        if ($this->nilai >= 3.67) return 'SB';   // skala 4 → bisa disesuaikan
        if ($this->nilai >= 3.00) return 'B';
        if ($this->nilai >= 2.00) return 'C';
        return 'K';
    }
}
