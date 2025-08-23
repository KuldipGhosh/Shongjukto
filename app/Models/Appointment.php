<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'beneficiary_id',
        'clinic_name',
        'appointment_date',
        'appointment_time',
        'status',
    ];

    public function beneficiary()
    {
        return $this->belongsTo(User::class, 'beneficiary_id');
    }
}


