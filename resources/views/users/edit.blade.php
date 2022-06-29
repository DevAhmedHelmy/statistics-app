@extends('layouts.master')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card px-1 py-1">
            <div class="card-header">
                <h4 class="card-title">Add New User</h4>
            </div>
            <div class="card-body">
                <form class="form form-vertical " action="{{ route('users.update', $user->id) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-icon">User Name</label>
                                <div class="input-group input-group-merge">
                                    <input type="text" id="first-name-icon"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        placeholder="User Name" value="{{ $user->name }}" required>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="email-id-icon">Email</label>
                                <div class="input-group input-group-merge">
                                    <input type="email" id="email-id-icon"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        placeholder="Email" value="{{ $user->email }}" required>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="contact-info-icon">Phone</label>
                                <div class="input-group input-group-merge">
                                    <input type="number" id="contact-info-icon"
                                        class="form-control @error('phone') is-invalid @enderror" name="phone"
                                        placeholder="Phone" value="{{ $user->phone }}">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="password-icon">Password</label>
                                <div class="input-group input-group-merge">

                                    <input type="password" id="password-icon"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        placeholder="Password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Add
                                New User</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
