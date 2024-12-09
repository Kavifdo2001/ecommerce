<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    protected $fillable = [
        'user_id',
        'additional',
        'grand_total',
        'order_no',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'products_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // Make sure the foreign key is correct
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItems::class, 'order_id');
    }


}
