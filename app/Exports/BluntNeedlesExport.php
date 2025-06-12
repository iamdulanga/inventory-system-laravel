<?php

namespace App\Exports;

use App\BluntNeedle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class BluntNeedlesExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return BluntNeedle::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date',
            'Employee EPF',
            'Job Number',
            'Section',
            'Needle Type',
            'Needle Size',
            'Machine Number',
            'Was Embedded',
            'New Needle Type',
            'New Needle Size',
            'Created At',
            'Updated At'
        ];
    }
}