<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model; // IMPORT THIS

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name', 'detail'
    ];
}