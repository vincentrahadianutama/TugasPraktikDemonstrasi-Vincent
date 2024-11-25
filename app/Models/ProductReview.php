<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'product_id',
        'rating',
        'comment',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class)->withDefault([
            'name' => 'Unknown Customer',
        ]);
    }

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault([
            'product_name' => 'Unknown Product',
        ]);
    }

}
