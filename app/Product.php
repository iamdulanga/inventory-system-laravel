<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'item', 
        'total_in', 
        'total_out', 
        'current_stock', 
        'stock_alert'
    ];
}
