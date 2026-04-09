<x-front-layout title="Login">

    <!-- Start Account Login Area -->
    <div class="account-login section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-8 col-12">
                    <form class="card p-4 shadow-sm" action="{{ route('login') }}" method="post">
                        @csrf
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h3>Login Now</h3>
                                <p>You can login using your social media account or email address.</p>
                            </div>

                            <!-- Social Login Buttons -->
                            <div class="d-flex gap-2 mb-3">
                                <a href="#" class="btn btn-primary flex-fill"><i class="lni lni-facebook"></i> Facebook</a>
                                <a href="#" class="btn btn-info flex-fill"><i class="lni lni-twitter-original"></i> Twitter</a>
                                <a href="#" class="btn btn-danger flex-fill"><i class="lni lni-google"></i> Google</a>
                            </div>

                            <div class="text-center my-3">
                                <span>Or</span>
                            </div>

                            <!-- Validation Error -->
                            @if ($errors->has(config('fortify.username')))
                            <div class="alert alert-danger">
                                {{ $errors->first(config('fortify.username')) }}
                            </div>
                            @endif

                            <!-- Email Input -->
                            <div class="mb-3">
                                <label for="reg-email" class="form-label">Email</label>
                                <input type="text" class="form-control" name="{{ config('fortify.username') }}" id="reg-email" required>
                            </div>

                            <!-- Password Input -->
                            <div class="mb-3">
                                <label for="reg-pass" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="reg-pass" required>
                            </div>

                            <!-- Remember & Forgot Password -->
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div class="form-check">
                                    <input type="checkbox" name="remember" value="1" class="form-check-input" id="rememberCheck">
                                    <label class="form-check-label" for="rememberCheck">Remember me</label>
                                </div>
                                @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="text-decoration-none">Forgot password?</a>
                                @endif
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mb-3">
                                <button class="btn btn-primary" type="submit">Login</button>
                            </div>

                            <!-- Register Link -->
                            @if (Route::has('register'))
                            <p class="text-center">Don't have an account? <a href="{{ route('register') }}" class="text-decoration-none">Register here</a></p>
                            @endif
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Login Area -->

</x-front-layout>