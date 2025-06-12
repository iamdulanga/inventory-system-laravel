<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtraNeedle extends Model
{
    protected $fillable = [
        'retrieved_date',
        'needle_type',
        'needle_size',
        'machine_number',
        'submitted_epf',
        'section_submitted',
        'delivery_date',
        'retrieved_epf',
        'section_retrieved',
        'new_machine_number'
    ];
    
    protected $appends = ['unique_identifier'];
    
    public function getUniqueIdentifierAttribute()
    {
        return "{$this->needle_type}/{$this->needle_size}/{$this->machine_number}";
    }
}