<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];

    public function orders()
    {
        return $this->hasMany(Order::class, 'store_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'store_id', 'id');
    }
}
