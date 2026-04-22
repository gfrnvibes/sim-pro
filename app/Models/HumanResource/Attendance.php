<?php

namespace App\Models\HumanResource;

use App\Models\HumanResource\AttendanceLog;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'employee_id','session_id','date',
        'checkin_at','checkout_at',
        'checkin_lat','checkin_lng',
        'checkout_lat','checkout_lng',
        'checkin_photo','checkout_photo',
        'status','notes'
    ];

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function session()
    {
        return $this->belongsTo(AttendanceSession::class, 'session_id');
    }

    public function logs()
    {
        return $this->hasMany(AttendanceLog::class);
    }
}
