<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable = [
        'nip','name','email','phone','photo',
        'face_encoding','is_active'
    ];

    public function positions()
    {
        return $this->belongsToMany(Position::class, 'employee_positions');
    }

    public function attendances()
    {
        return $this->hasMany(Attendance::class);
    }

    public function user()
    {
        return $this->hasOne(\App\Models\User::class);
    }
}
