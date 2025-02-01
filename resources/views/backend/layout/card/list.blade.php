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
                    <th scope="col">Card Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cards as $index => $card)
                    <tr>
                        <td>{{ $card->id }}</td>
                        <td>{{ $card->name }}</td>
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
