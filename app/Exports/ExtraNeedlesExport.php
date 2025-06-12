<?php

namespace App\Exports;

use App\ExtraNeedle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ExtraNeedlesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ExtraNeedle::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Retrieved Date',
            'Needle Type',
            'Needle Size',
            'Machine Number',
            'Submitted EPF',
            'Section (Submitted)',
            'Delivery Date',
            'Retrieved EPF',
            'Section (Retrieved)',
            'New Machine Number',
            'Unique Identifier',
            'Created At',
            'Updated At'
        ];
    }
}