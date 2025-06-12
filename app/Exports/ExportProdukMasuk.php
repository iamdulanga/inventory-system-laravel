<?php

namespace App\Exports;

use App\ProductMasuk;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ProductMasukExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return ProductMasuk::all();
    }

    public function headings(): array
    {
        return [
            'ID',
            'Date',
            'Item',
            'Quantity',
            'Created At',
            'Updated At'
        ];
    }
}