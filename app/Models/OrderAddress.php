<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderAddress extends Model
{
    protected $fillable = [
        'order_id',
        'first_name',
        'last_name',
        'city',
        'email',
        'phone_number',
        'street_address',
        'state',
        'postal_code',
        'country'
    ];
}
