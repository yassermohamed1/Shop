@foreach ($categoriesWithProducts as $category)
<section class="product-section-3">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>{{ $category['name'] }}</h2>
        </div>
        <div class="row">
            @foreach($category['products'] as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="product-box-4 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="product-image product-image-2">
                        <a href="">
                            <img src="{{ asset('storage/images/products/' . $product['image']) }}"
                                class="img-fluid blur-up lazyload" alt="{{ $product['name'] }}">
                        </a>
                        <ul class="option">
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Quick View">
                                <a href="" data-bs-toggle="modal" data-bs-target="#view">
                                    <i class="iconly-Show icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Wishlist">
                                <a href="javascript:void(0)" class="notifi-wishlist">
                                    <i class="iconly-Heart icli"></i>
                                </a>
                            </li>
                            <li data-bs-toggle="tooltip" data-bs-placement="top" title="Compare">
                                <a href="compare.html">
                                    <i class="iconly-Swap icli"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="product-detail">
                        <ul class="rating">
                            @for($i = 1; $i <= 5; $i++) <li>
                                @if($i <= 5) <i data-feather="star" class="fill"></i>
                                    @else
                                    <i data-feather="star"></i>
                                    @endif
                                    </li>
                                    @endfor
                        </ul>
                        <a href="">
                            <h5 class="name text-title">{{ $product['name'] }}</h5>
                        </a>
                        <h5 class="price theme-color">{{ $product['price'] }}</h5>
                        <div class="addtocart_btn">
                            <button class="add-button addcart-button btn buy-button text-light">
                                <i class="fa-solid fa-plus"></i>
                            </button>
                            <div class="qty-box cart_qty">
                                <div class="input-group">
                                    <button type="button" class="btn qty-left-minus" data-type="minus" data-field="">
                                        <i class="fa fa-minus" aria-hidden="true"></i>
                                    </button>
                                    <input class="form-control input-number qty-input" type="text" name="quantity"
                                        value="1">
                                    <button type="button" class="btn qty-right-plus" data-type="plus" data-field="">
                                        <i class="fa fa-plus" aria-hidden="true"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endforeach