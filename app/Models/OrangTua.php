<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OrangTua extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'siswa_id', 'hubungan', 'nama', 'nik', 'pekerjaan',
        'pendidikan_terakhir', 'alamat', 'no_hp', 'email', 'foto_path',
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class);
    }
}
