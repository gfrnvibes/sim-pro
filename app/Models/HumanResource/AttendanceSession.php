<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class AttendanceSession extends Model
{
    protected $fillable = [
        'name','start_time','end_time',
        'radius_meter','latitude','longitude'
    ];

    public function attendances()
    {
        return $this->hasMany(Attendance::class, 'session_id');
    }
}
