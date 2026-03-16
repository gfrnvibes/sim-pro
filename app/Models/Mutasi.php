<?php

namespace App\Models;

use App\Models\Siswa;
use App\Models\TahunAjaran;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Mutasi extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'siswa_id', 'jenis', 'tanggal_mutasi', 'asal_sekolah',
        'tujuan_sekolah', 'no_surat', 'tanggal_surat', 'alasan', 'tahun_ajaran_id',
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
