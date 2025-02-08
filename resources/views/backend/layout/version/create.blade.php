@extends('backend.app')
@section('title')
    Version Create
@endsection
@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
        <div class="d-flex justify-content-between mb-4">
            <!-- Add Version Button -->
            <a href="{{ route('version') }}" type="button" class="btn btn-primary" data-bs-toggle="modal"
                data-bs-target="#addPlatformModal">
                Back To Previous
            </a>
        </div>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <form action="{{ route('version.store') }}" method="POST">
            @csrf
            <div class="row mb-3">
                <!-- Platform Name Dropdown -->
                <div class="col-md-12">
                    <label for="name" class="form-label">Version Name</label>
                    <input type="text" class="form-control" name="name" id="name" placeholder="Version Name" />

                    @error('name')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="col-12">
                    <button type="submit" class="btn btn-success">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection
