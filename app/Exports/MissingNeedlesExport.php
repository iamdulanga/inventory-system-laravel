<?php

namespace App\Exports;

use App\Models\MissingNeedle;
use Maatwebsite\Excel\Concerns\FromCollection;

class MissingNeedlesExport implements FromCollection
{
    public function collection()
    {
        return MissingNeedle::all();
    }
}
