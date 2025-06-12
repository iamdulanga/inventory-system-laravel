<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BluntNeedle extends Model
{
    protected $fillable = [
        'date',
        'employee_epf',
        'job_number',
        'section',
        'needle_type',
        'needle_size',
        'machine_number',
        'was_embedded',
        'new_needle_type',
        'new_needle_size'
    ];
}