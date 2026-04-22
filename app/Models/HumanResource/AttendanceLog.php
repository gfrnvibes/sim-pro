<?php

namespace App\Models\HumanResource;

use Illuminate\Database\Eloquent\Model;

class AttendanceLog extends Model
{
    protected $fillable = [
        'attendance_id',
        'response_face',
        'response_distance',
        'raw_payload'
    ];

    protected $casts = [
        'raw_payload' => 'array',
    ];

    public function attendance()
    {
        return $this->belongsTo(Attendance::class);
    }
}
