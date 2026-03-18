<?php

namespace App\Repositeries\Cart;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CartModelRepository implements CartRepository
{

    public function get(): Collection
    {
        return Cart::with('product')->get();
    }


    public function add(Product $product, $quantity = 1)
    {
        $item = Cart::where('product_id', '=', $product->id)

            ->first();
        if (!$item) {
            return Cart::create([

                'user_id'    => Auth::id(),
                'product_id' => $product->id,
                'quantity'   => $quantity
            ]);
        }
        return $item->increment('quantity', $quantity);
    }

    /**
     * تحديث كمية منتج في السلة
     */
    public function update($id, $quantity)
    {
        return Cart::where('id', '=', $id)

            ->update(['quantity' => $quantity]);
    }

    public function delete($id)
    {
        return Cart::where('id', '=', $id)


            ->delete();
    }


    public function empty()
    {
        return Cart::query()->delete();
    }

   
    public function total(): float
    {
        return Cart::with('product')
            ->get()
            ->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });
    }
}
