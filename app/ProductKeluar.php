<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductKeluar extends Model
{
    protected $table = 'product_keluar';
    
    protected $fillable = [
        'date', 
        'item', 
        'quantity'
    ];
}
