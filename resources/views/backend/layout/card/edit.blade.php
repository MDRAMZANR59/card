@extends('backend.app')

@section('title')
    Card Edit
@endsection

@section('Content')
    <div class="container">
        <div class="d-flex justify-content-between mb-4">
            <!-- Back Button -->
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

        <!-- Form for editing a card -->
        <form action="{{ route('card.update', $olddata->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Title"
                    value="{{ old('title', $olddata->title) }}" />
                @error('title')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Platform Select -->
            <div class="row">
                <div class="mb-3">
                    <label for="platform_id" class="form-label">Platform</label>
                    <select class="form-select" id="platform_id" name="platform_id">
                        @foreach ($platforms as $platform)
                            <option value="{{ $platform->id }}" @if ($platform->id == $olddata->platform_id) selected @endif>
                                {{ $platform->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('platform_id')
                        <div class="invalid-feedback d-block">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="col-12 col-md-4">
                    <label for="version_id" class="form-label">Card Version Name</label>
                    <select class="js-example-basic-multiple" id="version_id" multiple="multiple" name="version_id[]">
                        @foreach ($version as $version)
                            <option value="{{ $version->id }}">{{ $version->name }}</option>
                        @endforeach
                    </select>
                    @error('version_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount-->
                <div class="col-12 col-md-4">
                    <label for="amount_id" class="form-label">Amounts</label>
                    <select class="js-example-basic-multiple" id="amount_id" multiple="multiple" name="amount_id[]">
                        @foreach ($amount as $amount)
                            <option value="{{ $amount->id }}">{{ $amount->title }}</option>
                        @endforeach
                    </select>
                    @error('amount_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

            </div>
            <!-- Usage Field -->
            <div class="mb-3">
                <label for="usage" class="form-label">Usage</label>
                <input type="text" class="form-control" id="usage" name="usage" placeholder="Usage"
                    value="{{ old('usage', $olddata->usage) }}" />
                @error('usage')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Delivery Time Field -->
            <div class="mb-3">
                <label for="deliveryTime" class="form-label">Delivery Time</label>
                <input type="text" class="form-control" id="deliveryTime" name="deliveryTime" placeholder="Delivery Time"
                    value="{{ old('deliveryTime', $olddata->deliveryTime) }}" />
                @error('deliveryTime')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Quantity Field -->
            <div class="mb-3">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Quantity"
                    value="{{ old('qty', $olddata->qty) }}" />
                @error('qty')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Image Field -->
            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <input type="file" class="form-control" id="image" name="image" />
                @if ($olddata->image)
                    <div class="mt-2">
                        <img src="{{ asset('backend/img/' . $olddata->image) }}" alt="Current Image" width="100" />
                    </div>
                @endif
                @error('image')
                    <div class="invalid-feedback d-block">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Submit Button -->
            <div class="mb-3">
                <button type="submit" class="btn btn-success w-100">Submit</button>
            </div>
        </form>
    </div>
    @push('script')
        <script>
            $(document).ready(function() {
                // Initialize select2 for multiple selections
                $('.js-example-basic-multiple').select2({
                    // Ensures the select box takes up the full width
                });
            });
        </script>
    @endpush
@endsection
