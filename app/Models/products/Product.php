<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'status',
        'code',
        'price',
        'quantity',
        'brand_id',
        'subcategory_id',
    ];
}
