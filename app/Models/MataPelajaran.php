<?php

namespace App\Models;

use App\Models\CapaianPembelajaran;
use App\Models\PenilaianSiswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MataPelajaran extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'kode', 'nama', 'kelompok', 'is_pai_sub', 'fase',
    ];

    public function capaianPembelajarans()
    {
        return $this->hasMany(CapaianPembelajaran::class);
    }

    public function penilaianSiswas()
    {
        return $this->hasMany(PenilaianSiswa::class);
    }

    public function kurikulumVersion()
    {
        return $this->belongsTo(KurikulumVersion::class, 'kurikulum_version_id');
    }

    // --------------------------------------------------
    // Scope (contoh tambahan yang berguna)
    // --------------------------------------------------

    /**
     * Filter mata pelajaran berdasarkan versi kurikulum aktif
     */
    public function scopeKurikulumAktif($query)
    {
        return $query->whereHas('kurikulumVersion', function ($q) {
            $q->where('is_active', true);
        });
    }

    /**
     * Filter mata pelajaran untuk versi kurikulum tertentu
     */
    public function scopeKurikulum($query, $kurikulumVersionId)
    {
        return $query->where('kurikulum_version_id', $kurikulumVersionId);
    }

    // --------------------------------------------------
    // Accessor (opsional)
    // --------------------------------------------------

    public function getKurikulumNamaAttribute(): ?string
    {
        return $this->kurikulumVersion?->nama ?? 'Belum ditentukan';
    }

    public function getIsKurikulumAktifAttribute(): bool
    {
        return $this->kurikulumVersion?->is_active ?? false;
    }
}
