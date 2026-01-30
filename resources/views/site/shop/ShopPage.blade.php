@extends('layouts.site')
@section('content')

<!-- Shop Section Start 
-->
<section class="section-b-space shop-section">
    <div class="container-fluid-lg">
        <div class="row">
            <div class="col-custome-3 wow fadeInUp">
                <div class="left-box">
                    <div class="shop-left-sidebar">
                        <div class="back-button">
                            <h3><i class="fa-solid fa-arrow-left"></i> Back</h3>
                        </div>
                        <div class="accordion custome-accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                    <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <span>Categories</span>
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse show"
                                    aria-labelledby="panelsStayOpen-headingOne">
                                    <div class="accordion-body">


                                        <ul class="category-list custom-padding custom-height">
                                            @foreach ($categories as $category)
                                            <li>
                                                <div class="form-check ps-0 m-0 category-list-box">
                                                    <input class="checkbox_animated" type="checkbox"
                                                        id="{{ $category->name }}" name="category_ids[]"
                                                        value="{{ $category->id }}">
                                                    <label class="form-check-label" for="{{ $category->name }}">
                                                        <span class="name">{{ $category->name }}</span>
                                                        <span class="number">({{ $category->products_count }})</span>
                                                    </label>
                                                </div>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>








                        </div>
                    </div>
                </div>
            </div>

            <div class="col-custome-9 wow fadeInUp">
                <div class="show-button">
                    <div class="filter-button-group mt-0">
                        <div class="filter-button d-inline-block d-lg-none">
                            <a><i class="fa-solid fa-filter"></i> Filter Menu</a>
                        </div>
                    </div>

                    <div class="top-filter-menu">
                        <div class="category-dropdown">
                            <h5 class="text-content">Sort By :</h5>
                            <div class="dropdown">
                                <button class="dropdown-toggle" type="button" id="dropdownMenuButton1"
                                    data-bs-toggle="dropdown">
                                    <span id="sort-by">Most Popular</span> <i class="fa-solid fa-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                    <li>
                                        <a class="dropdown-item" id="pop" href="?sort=popularity">Popularity</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="low" href="?sort=low">Low - High Price</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" id="high" href="?sort=high">High - Low Price</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="grid-option d-none d-md-block">
                            <ul>
                                <li class="three-grid">
                                    <a href="javascript:void(0)">
                                        <img src="../assets/svg/grid-3.svg" class="blur-up lazyload" alt="">
                                    </a>
                                </li>
                                <li class="grid-btn d-xxl-inline-block d-none active">
                                    <a href="javascript:void(0)">
                                        <img src="../assets/svg/grid-4.svg"
                                            class="blur-up lazyload d-lg-inline-block d-none" alt="">
                                        <img src="../assets/svg/grid.svg"
                                            class="blur-up lazyload img-fluid d-lg-none d-inline-block" alt="">
                                    </a>
                                </li>
                                <li class="list-btn">
                                    <a href="javascript:void(0)">
                                        <img src="../assets/svg/list.svg" class="blur-up lazyload" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div
                    class="row g-sm-4 g-3 row-cols-xxl-4 row-cols-xl-3 row-cols-lg-2 row-cols-md-3 row-cols-2 product-list-section">
                    @foreach ($products as $product)
                    <div>
                        <div class="product-box-3 h-100 wow fadeInUp">
                            <div class="product-header">
                                <div class="product-image">
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <img src="{{ asset('storage/images/products/' . $product->image) }}"
                                            class="img-fluid blur-up lazyload" alt="{{ $product->name }}">
                                    </a>

                                    <!-- Product options - View, Compare, Wishlist -->
                                </div>

                            </div>
                            <div class="product-footer">
                                <div class="product-detail">
                                    <span class="span-name">{{ $product->category->name }}</span>
                                    <a href="{{ route('products.show', $product->id) }}">
                                        <h5 class="name">{{ $product->name }}</h5>
                                    </a>
                                    <p class="text-content mt-1 mb-2 product-content">{{ $product->description }}</p>
                                    <div class="product-rating mt-2">
                                        <ul class="rating">
                                            @for ($i = 0; $i < $product->rating; $i++)
                                                <li><i data-feather="star" class="fill"></i></li>
                                                @endfor
                                        </ul>
                                        <span class="badge badge-primary">{{ $product->price }}</span>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <nav class="custome-pagination">
                    <ul class="pagination justify-content-center">
                        @if ($products->onFirstPage())
                        <li class="page-item disabled">
                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                        @else
                        <li class="page-item">
                            <a class="page-link" href="{{ $products->previousPageUrl() }}" tabindex="-1"
                                aria-disabled="true">
                                <i class="fa-solid fa-angles-left"></i>
                            </a>
                        </li>
                        @endif

                        @for ($i = 1; $i <= $products->lastPage(); $i++)
                            <li class="page-item{{ $products->currentPage() === $i ? ' active' : '' }}">
                                <a class="page-link" href="{{ $products->url($i) }}">{{ $i }}</a>
                            </li>
                            @endfor

                            @if ($products->hasMorePages())
                            <li class="page-item">
                                <a class="page-link" href="{{ $products->nextPageUrl() }}">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                            @else
                            <li class="page-item disabled">
                                <a class="page-link" href="#" aria-disabled="true">
                                    <i class="fa-solid fa-angles-right"></i>
                                </a>
                            </li>
                            @endif
                    </ul>
                </nav>

            </div>
        </div>
</section>

<script>
const checkboxes = document.querySelectorAll('input[type="checkbox"]');
const searchBox = document.querySelector('#search');
const sortLinks = document.querySelectorAll('.dropdown-item');

sortLinks.forEach(link => {
    link.addEventListener('click', (event) => {
        event.preventDefault();
        const sortCriteria = event.target.id;
        const queryParams = new URLSearchParams(window.location.search);
        queryParams.set('sort', sortCriteria);
        const url = `${window.location.pathname}?${queryParams.toString()}`;
        window.location.href = url;
    });
});
// Function to get the selected categories from the query parameters
function getSelectedCategories() {
    const urlParams = new URLSearchParams(window.location.search);
    const categoriesParam = urlParams.get('categories');
    if (categoriesParam) {
        return categoriesParam.split(',');
    } else {
        return [];
    }
}

// Function to update the query parameters and reload the page
function updateFilter() {
    const selectedCategories = Array.from(checkboxes)
        .filter(checkbox => checkbox.checked)
        .map(checkbox => checkbox.value);
    const queryParams = new URLSearchParams({
        categories: selectedCategories,
    });
    const url = `/shop?${queryParams.toString()}`;
    window.location.href = url;
}

checkboxes.forEach(checkbox => {
    // Check the checkbox if its value is in the selected categories
    if (getSelectedCategories().includes(checkbox.value)) {
        checkbox.checked = true;
    }
    checkbox.addEventListener('change', () => {
        updateFilter();
    });
});

searchBox.addEventListener('change', () => {
    updateFilter();
});
</script>




@endsection