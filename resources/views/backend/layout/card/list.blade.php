{{-- @extends('backend.app')
@section('title')
    Card List
@endsection
@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
        <div class="d-flex justify-content-between mb-4">
            <!-- Back Button (Top Left) -->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>

            <!-- Add Card Button (Top Right) -->
            <a href="{{ route('card.create') }}" class="btn btn-primary">Add Card</a>
        </div>

        <!-- Table Section -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Title</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Usage</th>
                    <th scope="col">Version</th>
                    <th scope="col">Delivary Time</th>
                    <th scope="col">Available Amount</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->title }}</td>
                        <td>
                            {{ $card->platform->name }}
                        </td>
                        <td>{{ $card->usage }}</td>
                        <td>
                            @foreach ($card->CardVersion as $version)
                                {{ $version->version_id }}
                            @endforeach
                        </td>
                        <td>{{ $card->deliveryTime }}</td>
                        <td>
                            @foreach ($card->AmountCard as $amount)
                                {{ $amount->amount_id }}
                            @endforeach
                        </td>
                        <td>{{ $card->qty }}</td>
                        <td><img width="50px" height="50px" src="{{ asset('backend/img/' . $card->image) }}" /> </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('card.edit', $card->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('card.delete', $card->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this card?');">
                                @csrf
                                {{-- @method('DELETE') --}}
{{-- <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div> --}}
{{-- @endsection --}}

@extends('backend.app')
@section('title')
    Card List
@endsection
@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
        <div class="d-flex justify-content-between mb-4">
            <!-- Back Button (Top Left) -->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>

            <!-- Add Card Button (Top Right) -->
            <a href="{{ route('card.create') }}" class="btn btn-primary">Add Card</a>
        </div>

        <!-- Table Section -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Title</th>
                    <th scope="col">Platform</th>
                    <th scope="col">Usage</th>
                    <th scope="col">Version</th>
                    <th scope="col">Delivery Time</th>
                    <th scope="col">Available Amount</th>
                    <th scope="col">Stock</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->title }}</td>
                        <td>
                            {{ $card->platform->name }}
                        </td>
                        <td>{{ $card->usage }}</td>
                        <td>
                            @foreach ($card->CardVersion as $cardVersion)
                                {{ $cardVersion->version->name . ',' }}<!-- Show Here With "version.name" to Name Of All version  -->
                            @endforeach
                        </td>
                        <td>{{ $card->deliveryTime }}</td>
                        <td>
                            @foreach ($card->AmountCard as $amount)
                                {{ $amount->amount->title }}
                            @endforeach
                        </td>
                        <td>{{ $card->qty }}</td>
                        <td><img width="50px" height="50px" src="{{ asset('backend/img/' . $card->image) }}" /> </td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('card.edit', $card->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('card.delete', $card->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this card?');">
                                @csrf
                                {{-- @method('DELETE') --}}
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
