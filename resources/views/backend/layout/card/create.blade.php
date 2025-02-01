@extends('backend.app')

@section('title')
    Card Create
@endsection

@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
        <div class="d-flex justify-content-between mb-4">
            <!-- Add Card Button -->
            <a href="{{ route('card') }}" type="button" class="btn btn-primary">
                Back To Previous
            </a>
        </div>

        <!-- Success Message -->
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Form for creating a card -->
        <form action="{{ route('card.store') }}" method="POST">
            @csrf

            <!-- Platform Field -->
            <div class="mb-3">
                <label for="platform" class="form-label">Platform</label>
                <select class="form-select" id="platform" name="platform">
                    <option class="form-select" value="Roblox">Roblox</option>
                    <option class="form-select" value="Shopify Card">Shopify Card</option>
                </select>
                @error('platform')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Usage Field -->
            <div class="mb-3">
                <label for="usage" class="form-label">Usage</label>
                <input type="text" class="form-control" id="usage" name="usage" placeholder="Usage"
                    value="{{ old('usage') }}" />
                @error('usage')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Version Field -->
            {{-- <div class="mb-3">
                <label for="version" class="form-label">Version</label>
                <select class="form-select" id="version" name="version">
                    <option value="Usa">Usa</option>
                    <option value="Canada">Canada</option>
                </select>
                @error('version')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div> --}}

            <!-- Delivery Time Field -->
            <div class="mb-3">
                <label for="deliveryTime" class="form-label">Delivery Time</label>
                <input type="text" class="form-control" id="deliveryTime" name="deliveryTime" placeholder="Delivery Time"
                    value="{{ old('deliveryTime') }}" />
                @error('deliveryTime')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-success">Submit</button>
        </form>
    </div>
@endsection
