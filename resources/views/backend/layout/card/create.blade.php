@extends('backend.app')

@section('title')
    Card Create
@endsection

@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
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

        <!-- Form for creating a card -->
        <form action="{{ route('card.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mb-3">
                <!-- Platform Select -->
                <div class="col-12">
                    <label for="platform_id" class="form-label">Platform</label>
                    <select class="form-select" id="platform_id" name="platform_id">
                        <option value="">Select One</option>
                        @foreach ($platform as $platform)
                            <option value="{{ $platform->id }}" @if (old('platform_id') == $platform->id) Selected @endif>
                                {{ $platform->name }}</option>
                        @endforeach
                    </select>
                    @error('platform_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Version-->
                <div class="col-12">
                    <label for="version_id" class="form-label">Card Version Name</label>
                    <select class="js-example-basic-multiple form-select" id="version_id" multiple="multiple"
                        name="version_id[]">
                        @foreach ($version as $version)
                            <option value="{{ $version->id }}" @if (in_array($version->id, old('version_id', []))) Selected @endif>
                                {{ $version->name }}</option>
                        @endforeach
                    </select>
                    @error('version_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Amount-->
                <div class="col-12"> <!-- col-md-6 used to make it larger -->
                    <label for="amount_id" class="form-label">Amounts</label>
                    <select class="js-example-basic-multiple form-select" id="amount_id" multiple="multiple"
                        name="amount_id[]">
                        @foreach ($amount as $amount)
                            <option value="{{ $amount->id }}" @if (in_array($amount->id, old('amount_id', []))) Selected @endif>
                                {{ $amount->title }} </option>
                        @endforeach
                    </select>
                    @error('amount_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <!-- Title Field -->
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Enter Title"
                    value="{{ old('title') }}" />
                @error('title')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Usage Field -->
            <div class="mb-3">
                <label for="usage" class="form-label">Usage</label>
                <input type="text" class="form-control" id="usage" name="usage" placeholder="Enter Usage"
                    value="{{ old('usage') }}" />
                @error('usage')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Delivery Time Field -->
            <div class="mb-3">
                <label for="deliveryTime" class="form-label">Delivery Time</label>
                <input type="text" class="form-control" id="deliveryTime" name="deliveryTime"
                    placeholder="Enter Delivery Time" value="{{ old('deliveryTime') }}" />
                @error('deliveryTime')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Quantity Field -->
            <div class="mb-3">
                <label for="qty" class="form-label">Quantity</label>
                <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity"
                    value="{{ old('qty') }}" />
                @error('qty')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            <!-- Image Field -->
            <div class="mb-3">
                <label for="image" class="form-label">Photo</label>
                <input type="file" class="form-control" id="image" name="image" />
                @error('image')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
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
                    placeholder: "Select one or more",
                    allowClear: true
                });
            });
        </script>
    @endpush

    <style>
        #amount_id,
        #version_id {
            width: 100%;
        }
    </style>
@endsection
