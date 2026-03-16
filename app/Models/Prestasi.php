<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Prestasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'siswa_id', 'tahun_ajaran_id', 'nama_prestasi', 'deskripsi',
        'penyelenggara', 'tingkat', 'tanggal_prestasi', 'juara', 'bukti_file_path',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }

    public function tahunAjaran()
    {
        return $this->belongsTo(TahunAjaran::class);
    }
}
