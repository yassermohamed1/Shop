<?php

namespace App\Facedes;

use App\Repositeries\Cart\CartRepository;
use Illuminate\Support\Facades\Facade;

class Cart extends Facade
{
    protected static function getFacadeAccessor()
    {
        return CartRepository::class;
    }
}
