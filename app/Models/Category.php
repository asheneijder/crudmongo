<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Category extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'categories';

    protected $fillable = [
        'name', 'slug'
    ];

    // Define the relationship: A Category has many Products
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}