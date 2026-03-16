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
}
