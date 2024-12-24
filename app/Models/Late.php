<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Late extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $casts = [
        'date_time_late' => 'datetime',
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}