<?php

namespace App\Http\Controllers\front;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Repositeries\Cart\CartModelRepository;
use App\Repositeries\Cart\CartRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class CartController extends Controller
{

    // protected $cart;

    // public function __construct(CartRepository $cart)
    // {
    //     $this->cart = $cart;
    // }
    /**
     * Display a listing of the resource.
     */
    public function index(CartRepository $cart)
    {


        return view('front.cart', [
            'cart' => $cart,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CartRepository $cart)
    {


        $request->validate([
            'product_id' => ['required', 'int', 'exists:products,id'],

            'quantity' => ['nullable', 'int', 'min:1']

        ]);
        $product = Product::findOrFail($request->post('product_id'));

        $cart->add($product, $request->post('quantity') ?? 1);


        return redirect()->route('Cart.index')->with('success', 'product added to cart');
    }




    public function update(CartRepository $cart, Request $request, $id)
    {
        $request->validate([

            'quantity' => ['nullable', 'int', 'min:1']

        ]);
        $cart->update($id, $request->post('quantity'));


        return response()->json([
            'success' => true,
            'quantity' => $request->post('quantity')
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CartRepository $cart, string $id)
    {

        $cart->delete($id);
        return redirect()->route('Cart.index')->with('success', 'product deleted to cart');
    }
}
