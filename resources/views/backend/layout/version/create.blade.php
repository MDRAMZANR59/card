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
                <div class="col-md-6">
                    <label for="platform_id" class="form-label">Platform Name</label>
                    <select class="form-select" id="platform_id" name="platform_id">
                        <option value="" selected disabled>Select Platform</option>
                        @foreach ([1, 2, 3, 4, 5] as $platform)
                            {{-- <option value="{{ $platform->id }}">{{ $platform->name }}</option> --}}
                            <option>One</option>
                        @endforeach
                    </select>
                    @error('platform_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Version Name Dropdown -->
                <div class="col-md-6">
                    <label for="version_id" class="form-label">Version Name</label>
                    <select class="form-select" id="version_id" name="version_id">
                        <option value="" selected disabled>Select Version</option>
                        @foreach ([1, 2, 3, 4] as $version)
                            {{-- <option value="{{ $version->id }}">{{ $version->name }}</option> --}}
                            <option value="">Two</option>
                        @endforeach
                    </select>
                    @error('version_id')
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
