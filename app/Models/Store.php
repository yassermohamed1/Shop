<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $guarded = [];
    public function orders()
    {
        return $this->hasMany(Order::class, 'stores_id', 'id');
    }
}
