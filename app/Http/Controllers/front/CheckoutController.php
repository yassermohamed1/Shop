<?php

namespace App\Http\Controllers\front;

use App\Events\OrderCreated;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Repositeries\Cart\CartRepository;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB as FacadesDB;
use Symfony\Component\Intl\Countries;

class CheckoutController extends Controller
{
    public function create(CartRepository $cart)
    {
        if ($cart->get()->count() == 0) {
            return redirect()->route('home');
        }
        return view('front.checkout', [
            'cart' => $cart,
            'countries' => Countries::getNames(),
        ]);
    }
    public function store(Request $request, CartRepository $cart)
    {

        DB::beginTransaction();

        try {

            $order = Order::create([
                'user_id' => Auth::id(),
                'payment_method' => 'cod',
            ]);

            foreach ($cart->get() as $item) {
                OrderItem::create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'name'       => $item->product->name,
                    'price'      => $item->product->price,
                    'quantity'   => $item->quantity,
                    'subtotal'   => $item->product->price * $item->quantity, // ⚡ هنا
                    'options'    => json_encode($item->options ?? []),
                ]);
            }

            foreach ($request->post('addr') as $type => $address) {
                $address['type'] = $type;
                $order->addresses()->create($address);
            }

            $cart->empty();

            event(new OrderCreated($order));

            DB::commit();
        } catch (\Exception $e) {

            DB::rollBack();

            dd($e->getMessage(), $e->getLine(), $e->getFile());
        }

        return redirect()
            ->route('home');
    }
}
