@extends('layouts.app')

@section('content')
    <div class="auth-wrapper auth-basic px-2">
        <div class="auth-inner my-2">
            <!-- Forgot Password basic -->
            <div class="card mb-0 p-2">
                <div class="card-body">
                    <a href="index.html" class="brand-logo">
                        <img src="{{ asset('admin') }}/app-assets/images/diamond.jpeg" width="40" height="40" />
                    </a>

                    <h4 class="card-title mb-1">Forgot Password? 🔒</h4>
                    <p class="card-text mb-2">Enter your email and we'll send you instructions to reset your password</p>
                    @if ($errors && $errors->any())
                        <span class="text-danger"> {{ $errors->first() }}</span>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}" class="auth-forgot-password-form mt-2">
                        @csrf
                        <div class="mb-1">
                            <label for="forgot-password-email" class="form-label">Email</label>
                            <input type="text" class="form-control" id="forgot-password-email" name="email"
                                placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1"
                                autofocus="">
                        </div>
                        <button type="submit" class="btn btn-primary w-100 waves-effect waves-float waves-light"
                            tabindex="2">Send reset
                            link</button>
                    </form>

                    <p class="text-center mt-2">
                        <a href="{{ route('login') }}"> <svg xmlns="http://www.w3.org/2000/svg" width="14"
                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left">
                                <polyline points="15 18 9 12 15 6"></polyline>
                            </svg> Back to login </a>
                    </p>
                </div>
            </div>
            <!-- /Forgot Password basic -->
        </div>
    </div>
@endsection
