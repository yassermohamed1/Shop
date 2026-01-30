<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class OrderItem extends Pivot
{
    use HasFactory;
    protected $table = 'order_item';


    public $incrementing = true;
    protected $fillable = ['order_id', 'product_id', 'name', 'price', 'subtotal', 'quantity', 'options'];

    public function product()
    {
        return $this->belongsTo(Product::class)->withDefault(['name' => $this->name]);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }
}
