@extends('backend.app')
@section('title')
    Platform Edit
@endsection
@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
        <div class="d-flex justify-content-between mb-4">

            <!-- Add Platform Button -->
            <a href="{{ route('platform') }}" type="button" class="btn btn-primary" data-bs-toggle="modal"
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

        <form action="{{ route('platform.update', $data->id) }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $data->name }}"
                    placeholder="Platform Name">
                @error('name')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
