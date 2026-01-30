@extends('layouts.login')
@section('content')
    <!-- login section start -->
    <section class="log-in-section section-b-space">
        <a href="" class="logo-login"><img src="{{('assets/admin/images/logo/1.png')}}" class="img-fluid"></a>
        <div class="container w-100">
            <div class="row">

                <div class="col-xl-5 col-lg-6 me-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h3>Welcome To Fastkart</h3>
                            <h4>Log In Your Account</h4>
                        </div>

                        <div class="input-box">
                            <form class="row g-4" method="POST" action="{{ route('admin.login.submit') }}" >
                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="email" class="form-control" id="email" placeholder="Email Address" name="email" value="{{ old('email') }}" required autofocus>
                                        <label for="email">Email Address</label>
                                    </div>
                                    @error('email')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>
                                @csrf

                                <div class="col-12">
                                    <div class="form-floating theme-form-floating log-in-form">
                                        <input type="password" class="form-control" id="password"
                                               placeholder="Password" name="password" required>
                                        <label for="password">Password</label>
                                    </div>
                                    @error('password')
                                    <div>{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="forgot-box">
                                        <a href="forgot.html" class="forgot-password">Forgot Password?</a>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <button class="btn btn-animation w-100 justify-content-center" type="submit">Log
                                        In</button>
                                </div>
                            </form>
                        </div>

                        <div class="other-log-in">
                            <h6>or</h6>
                        </div>

                        <div class="log-in-button">
                            <ul>
                                <li>
                                    <a href="https://www.google.com/" class="btn google-button w-100">
                                        <img src="../assets/images/inner-page/google.png" class="blur-up lazyload"
                                             alt=""> Log In with Google
                                    </a>
                                </li>
                                <li>
                                    <a href="https://www.facebook.com/" class="btn google-button w-100">
                                        <img src="../assets/images/inner-page/facebook.png" class="blur-up lazyload"
                                             alt=""> Log In with Facebook
                                    </a>
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login section end -->

@endsection
