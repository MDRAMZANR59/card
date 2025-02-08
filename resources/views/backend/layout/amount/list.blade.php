@extends('backend.app')
@section('title')
    Amount List
@endsection
@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
        <div class="d-flex justify-content-between mb-4">
            <!-- Back Button (Top Left) -->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>

            <!-- Add Amount Button (Top Right) -->
            <a href="{{ route('amount.create') }}" class="btn btn-primary">Add Amount</a>
        </div>

        <!-- Table Section -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Title</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($amounts as $index => $amount)
                    <tr>
                        <td>{{ $amount->id }}</td>
                        <td>{{ $amount->title }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('amount.edit', $amount->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('amount.delete', $amount->id) }}" method="POST" style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this amount?');">
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
