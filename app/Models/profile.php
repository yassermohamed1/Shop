<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'address',
        'gender',
        'birth_date',
        'country',
        'state',
        'city',
        'postal_code',
        'locale'
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
