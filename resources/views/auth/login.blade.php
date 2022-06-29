@extends('layouts.app')

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Login basic -->
            <div class="card mb-0 p-2">
                <div class="card-body">
                    <a href="#" class="brand-logo">
                        <img src="{{ asset('admin') }}/app-assets/images/diamond.jpeg" width="40" height="40" />
                    </a>

                    <h4 class="card-title mb-1">Welcome Back! 👋</h4>
                    <p class="card-text mb-2">Please sign-in to your account</p>
                    @if ($errors && $errors->any())
                        <span class="text-danger"> {{ $errors->first() }}</span>
                    @endif
                    <form class="auth-login-form mt-2" method="POST" action="{{ route('login') }}">
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
                                <a href="{{ route('password.request') }}">
                                    <small>Forgot Password?</small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input type="password" class="form-control form-control-merge" id="login-password"
                                    name="password" tabindex="2"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="login-password" required />
                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                            </div>
                        </div>

                        <button class="btn btn-primary w-100" type="submit" tabindex="4">Sign in</button>
                    </form>

                </div>
            </div>

        </div>
    </div>
@endsection
