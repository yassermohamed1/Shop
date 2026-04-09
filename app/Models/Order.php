<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'store_id',
        'payment_status',
        'payment_method',
        'status',
        'notes',
        'number',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }
    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id');
    }


    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_item', 'order_id', 'product_id')
            ->withPivot('name', 'price', 'quantity', 'options')
            ->using(OrderItem::class);
    }

    // علاقة العناوين
    public function addresses()
    {
        return $this->hasMany(OrderAddress::class);
    }

    public function billingaddress()
    {
        return $this->hasOne(OrderAddress::class)
            ->where('type', 'billing');
    }

    public function shippingaddress()
    {
        return $this->hasOne(OrderAddress::class)
            ->where('type', 'shipping');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function (Order $order) {
            $order->number = self::getNextNumber();
        });
    }

    public static function getNextNumber()
    {
        $year = Carbon::now()->year;
        $number = Order::whereYear('created_at', $year)->max('number');

        return $number ? $number + 1 : $year . '0001';
    }
}
