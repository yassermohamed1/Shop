<x-front-layout>

    <x-slot name="breadcrumb">
        <div class="breadcrumbs">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="breadcrumbs-content">
                            <h1 class="page-title">Checkout</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <ul class="breadcrumb-nav">
                            <li><a href="{{ route('home') }}"><i class="lni lni-home"></i> Home</a></li>
                            <li><a href="{{ route('products.index') }}">Shop</a></li>
                            <li>Checkout</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>

    <div class="container my-5">
        <div class="row">

            <!-- LEFT -->
            <div class="col-lg-8">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('checkout.store') }}" method="POST">
                    @csrf

                    <div class="accordion" id="checkoutAccordion">

                        <!-- Billing -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingBilling">
                                <button class="accordion-button" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseBilling">
                                    Personal Details
                                </button>
                            </h2>

                            <div id="collapseBilling" class="accordion-collapse collapse show"
                                data-bs-parent="#checkoutAccordion">
                                <div class="accordion-body">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" name="addr[billing][first_name]" class="form-control" placeholder="First Name">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="addr[billing][last_name]" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <input type="email" name="addr[billing][email]" class="form-control mb-3" placeholder="Email Address">
                                    <input type="text" name="addr[billing][phone_number]" class="form-control mb-3" placeholder="Phone Number">
                                    <input type="text" name="addr[billing][street_address]" class="form-control mb-3" placeholder="Mailing Address">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" name="addr[billing][city]" class="form-control" placeholder="City">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="addr[billing][postal_code]" class="form-control" placeholder="Post Code">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <select name="addr[billing][country]" class="form-control">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="addr[billing][state]" class="form-control" placeholder="State">
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary"
                                        data-bs-toggle="collapse" data-bs-target="#collapseShipping">
                                        Next Step
                                    </button>

                                </div>
                            </div>
                        </div>

                        <!-- Shipping -->
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingShipping">
                                <button class="accordion-button collapsed" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#collapseShipping">
                                    Shipping Address
                                </button>
                            </h2>

                            <div id="collapseShipping" class="accordion-collapse collapse"
                                data-bs-parent="#checkoutAccordion">
                                <div class="accordion-body">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" name="addr[shipping][first_name]" class="form-control" placeholder="First Name">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="addr[shipping][last_name]" class="form-control" placeholder="Last Name">
                                        </div>
                                    </div>

                                    <input type="email" name="addr[shipping][email]" class="form-control mb-3" placeholder="Email Address">
                                    <input type="text" name="addr[shipping][phone_number]" class="form-control mb-3" placeholder="Phone Number">
                                    <input type="text" name="addr[shipping][street_address]" class="form-control mb-3" placeholder="Mailing Address">

                                    <div class="row mb-3">
                                        <div class="col">
                                            <input type="text" name="addr[shipping][city]" class="form-control" placeholder="City">
                                        </div>
                                        <div class="col">
                                            <input type="text" name="addr[shipping][postal_code]" class="form-control" placeholder="Post Code">
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col">
                                            <select name="addr[shipping][country]" class="form-control">
                                                <option value="">Select Country</option>
                                                @foreach($countries as $country)
                                                <option value="{{ $country }}">{{ $country }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="text" name="addr[shipping][state]" class="form-control" placeholder="State">
                                        </div>
                                    </div>

                                    <button type="button" class="btn btn-primary"
                                        data-bs-toggle="collapse" data-bs-target="#collapsePayment">
                                        Next Step
                                    </button>

                                </div>
                            </div>
                        </div>

                        <!-- Payment -->

                        <button type="submit" class="btn btn-success">
                            Pay Now
                        </button>

                    </div>
                </form>
            </div>
            <!-- RIGHT -->
            <div class="col-lg-4 mt-4">

                <div class="mb-3">
                    <input type="text" class="form-control mb-2" placeholder="Enter Your Coupon">
                    <button class="btn btn-primary w-100">Apply Coupon</button>
                </div>

                <div class="totals p-3 border rounded bg-light">
                    <ul class="list-unstyled mb-3">
                        <li>
                            Cart Subtotal
                            <span class="float-end">{{ Currency::format($cart->total()) }}</span>
                        </li>
                        <li>Shipping <span class="float-end">Free</span></li>
                        <li class="fw-bold">
                            You Pay
                            <span class="float-end">{{ Currency::format($cart->total()) }}</span>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>

</x-front-layout>