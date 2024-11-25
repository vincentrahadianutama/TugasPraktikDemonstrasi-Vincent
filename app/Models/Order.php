<?php

// app/Models/Order.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_id', 'order_date', 'total_amount', 'status'];

    // Relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

}
