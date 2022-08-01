@extends('layouts.master')

@section('content')
    <div class="col-md-12 col-12">
        <div class="card px-1 py-1">
            <div class="card-header">
                <h4 class="card-title">Upload File</h4>
            </div>
            <div class="card-body">
                <form class="form form-vertical " action="{{ route('upload.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="mb-1">
                                <label class="form-label" for="first-name-icon">File</label>
                                <div class="input-group input-group-merge">
                                    <input type="file" id="first-name-icon"
                                        class="form-control " name="file"
                                        placeholder="User Name" required>

                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button type="submit" class="btn btn-primary me-1 waves-effect waves-float waves-light">Upload</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
