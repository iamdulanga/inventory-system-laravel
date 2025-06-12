<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductMasuk extends Model
{
    protected $table = 'product_masuk';

    protected $fillable = [
        'date',
        'item',
        'quantity',
    ];
}
