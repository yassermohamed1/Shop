<?php

namespace App\View\Components;

use App\Facedes\Cart;
use App\Repositeries\Cart\CartRepository;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Cartmenu extends Component
{
    public $items;
    public $total;
    /**
     * Create a new component instance.
     */
    public function __construct(CartRepository $cart)
    {
        $this->items = $cart->get();
        $this->total = $cart->total();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.cartmenu');
    }
}
