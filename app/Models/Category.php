<?php

namespace App\Models;

use http\Client;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'parent_id',
        'img'
    ];

    public function products()
    {
        return $this->hasMany(Product::class, 'category');
    }

    // Define a relationship for subcategories
    public function subCategories()
    {
        return $this->hasMany(SubCategory::class);
    }
}
