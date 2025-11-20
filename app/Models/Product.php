<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Product extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'products';

    protected $fillable = [
        'name', 'detail', 'category_id' // Added category_id
    ];

    // Define the relationship: A Product belongs to a Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}