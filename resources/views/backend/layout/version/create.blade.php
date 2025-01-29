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

            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Version Name">
                @error('name')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
                <label for="card_id" class="form-label">Card Id</label>
                <input type="number" class="form-control" id="card_id" name="card_id" placeholder="Card Id">
                @error('card_id')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
