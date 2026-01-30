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
    /**
     * جلب كل عناصر السلة للـ cookie الحالي
     */
    public function get(): Collection
    {
        return Cart::get();
    }

    /**
     * إضافة منتج جديد للسلة
     */
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
    public function update(Product $product, $quantity)
    {
        return Cart::where('product_id', '=', $product->id)

            ->update(['quantity' => $quantity]);
    }

    /**
     * حذف منتج من السلة
     */
    public function delete($id)
    {
        return Cart::where('id', '=', $id)


            ->delete();
    }

    /**
     * تفريغ السلة بالكامل
     */
    public function empty()
    {
        return Cart::query()->delete();
    }

    /**
     * حساب إجمالي سعر السلة
     */
    public function total(): float
    {
        return (float) Cart::join('products', 'products.id', '=', 'carts.product_id')
            ->selectRaw('SUM(products.price * carts.quantity) as total')
            ->value('total');
    }


    /**
     * جلب أو إنشاء cookie_id للسلة
     */
}
