<x-front-layout>
    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Cart</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{route('home')}}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="{{route('products.index')}}">Shop</a></li>
                            <li>Cart</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>


    <div class="shopping-cart section">
        <div class="container">
            <!-- Cart List Head -->
            <div class="cart-list-head">
                <div class="row bg-light p-3 rounded mb-3">
                    <div class="col-lg-1 col-md-1 col-12"></div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <p>Product Name</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Quantity</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Subtotal</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>Discount</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <p>Remove</p>
                    </div>
                </div>
            </div>

            <!-- Cart Items -->
            <div class="cart-items">
                @foreach($cart->get() as $item)
                <div class="row align-items-center p-3 mb-3 border rounded" id="{{$item->id}}">
                    <div class="col-lg-1 col-md-1 col-12">
                        <a href="{{  route('products.show',$item->product->id) }}"><img src="{{$item->product->image_url}}" alt="#"></a>
                    </div>
                    <div class="col-lg-4 col-md-3 col-12">
                        <h5 class="product-name"><a href="{{  route('products.show',$item->product->id) }}">{{$item->product->name}}</a></h5>
                        <p class="product-des">
                            <span><em>Type:</em> Mirrorless</span>
                            <span><em>Color:</em> Black</span>
                        </p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <input class="form-control form-control-sm item-quantity" data-id="{{$item->id}}" value="{{$item->quantity}}">

                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{Currency::format($item->quantity*$item->product->price)}}</p>
                    </div>
                    <div class="col-lg-2 col-md-2 col-12">
                        <p>{{Currency::format(0)}}</p>
                    </div>
                    <div class="col-lg-1 col-md-2 col-12">
                        <a class="remove-item" data-id="{{$item->id}}" href="#"><i class="lni lni-close"></i></a>
                    </div>
                </div>
                @endforeach
            </div>

            <!-- Coupon + Totals -->
            <div class="row mt-4 g-3">
                <!-- Coupon -->
                <div class="col-lg-8 col-md-6 col-12">
                    <form class="d-flex align-items-center p-2 rounded bg-light" style="max-width: 400px;">
                        <input type="text" name="Coupon" class="form-control form-control-sm me-2" placeholder="Enter Your Coupon">
                        <button class="btn btn-primary btn-sm">Apply Coupon</button>
                    </form>
                </div>

                <!-- Totals -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="totals p-3 border rounded bg-light">
                        <ul class="list-unstyled mb-3">
                            <li>Cart Subtotal <span class="float-end">{{Currency::format($cart->total())}}</span></li>
                            <li>Shipping <span class="float-end">Free</span></li>
                            <li>You Save <span class="float-end">$29.00</span></li>
                            <li class="fw-bold">You Pay <span class="float-end">{{Currency::format($cart->total())}}</span></li>
                        </ul>
                        <div class="d-flex gap-2">
                            <a href="checkout.html" class="btn btn-primary flex-fill">Checkout</a>
                            <a href="product-grids.html" class="btn btn-outline-secondary flex-fill">Continue shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
    <script>
        const csrf_token = "{{csrf_token()}}";
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ mix('js/cart.js') }}"></script>


    @endpush



</x-front-layout>