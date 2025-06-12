<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MissingNeedle extends Model
{
    protected $fillable = [
        'date',
        'employee_epf',
        'section',
        'broke_time',
        'release_time',
        'request_letter',
    ];
}
