@extends('layouts.app')

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            <div class="card mb-0 p-1">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        <img class="img-fluid" src="{{ asset('admin') }}/app-assets/images/full_logo.jpg" width="200" height="60" />
                    </a>
                    @if ($errors && $errors->any())
                        <span class="text-danger mt-1"> {{ $errors->first() }}</span>
                    @endif
                    <form class="mt-2" method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-1">
                            <label for="login-email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="login-email" name="email"
                                value="{{ old('email') }}" placeholder="john@example.com" aria-describedby="login-email"
                                tabindex="1" autofocus required />
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">Password</label>

                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge"
                                    name="password" tabindex="2" placeholder="Enter your password"
                                    required />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>

                        </div>

                        <button class="btn btn-primary w-100" type="submit" tabindex="4">Sign in</button>
                        <div class="d-flex justify-content-between mt-1">

                            <a href="{{ route('password.request') }}">
                                <small>Forgot Password?</small>
                            </a>
                        </div>
                    </form>
                    <div class="text-center mt-1">
                        <a href="https://www.pressganey.com/">

                            <img class="img-fluid" src="{{ asset('admin') }}/app-assets/images/press.jpg" width="200" height="60" />
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>
@endsection
