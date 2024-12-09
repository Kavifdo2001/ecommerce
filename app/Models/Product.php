<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $table = 'products';

    protected $fillable = [
        'name',
        'images',
        'category',
        'sub_category',
        'description',
        'quantity',
        'amount',
    ];

    public function categorys()
    {
        return $this->belongsTo(Category::class, 'category');
    }
    public function subcategory()
    {
        return $this->belongsTo(Category::class, 'sub_category');
    }
}
