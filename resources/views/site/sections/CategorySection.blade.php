<!-- Category Section Start -->
<section class="category-section-3 mb-3">
    <div class="container-fluid-lg">
        <div class="title">
            <h2>Shop By Categories</h2>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="category-slider-1 arrow-slider wow fadeInUp">
                    @foreach ($categories as $category)
                    <div>
                        <div class="category-box-list">
                            <a href="{{ route('shop', ['categories' => $category->id]) }}" class="category-name">
                                <h4>{{ $category->name }}</h4>
                                <h6>{{ $category->products->count() }} items</h6>
                            </a>
                            <div class="category-box-view">
                                <a href="{{ route('shop', ['categories' => $category->id]) }}">
                                    <img src="{{ asset('storage/images/categories/' . $category->image) }}"
                                        class="img-fluid blur-up lazyload" alt="">
                                </a>
                                <a href="{{ route('shop', ['categories' => $category->id]) }}" class=" btn shop-button">
                                    <span>Shop Now</span>
                                    <i class="fas fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Category Section End -->