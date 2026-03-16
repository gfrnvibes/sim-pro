<?php

namespace App\Models;

use App\Models\Siswa;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Extrakurikuler extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'nama', 'kode', 'deskripsi', 'kategori',
    ];

    public function siswas()
    {
        return $this->belongsToMany(Siswa::class, 'siswa_ekstrakurikulers')
            ->withPivot('tahun_ajaran_id', 'semester', 'jabatan', 'status', 'keterangan')
            ->withTimestamps();
    }

    // Di Ekstrakurikuler.php

    public function siswaEkstrakurikuler()
    {
        return $this->hasMany(SiswaExtrakurikuler::class);
    }

    public function siswaAktif()
    {
        return $this->hasMany(SiswaExtrakurikuler::class)
            ->aktif();
    }
}
