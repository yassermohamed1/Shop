<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Intl\Countries;

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
        'country',
        'type'
    ];
    public function getNameAttribute()
    {
        return $this->first_name . '' . $this->last_name;
    }
    public function getCountryNameAttribute()
    {
        return Countries::getName($this->country);
    }
}
