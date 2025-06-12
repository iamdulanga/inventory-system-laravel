<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrokenNeedle extends Model
{
    protected $fillable = [
        'date',
        'employee_epf',
        'job_number',
        'section',
        'needle_type',
        'needle_size',
        'machine_number',
        'all_parts_traced',
        'new_needle_type',
        'new_needle_size'
    ];
}