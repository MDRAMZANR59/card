@extends('backend.app')
@section('title')
    Version List
@endsection
@section('Content')
    <div class="container">
        <!-- Row for buttons at the top -->
        <div class="d-flex justify-content-between mb-4">
            <!-- Back Button (Top Left) -->
            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">Back</a>

            <!-- Add Version Button (Top Right) -->
            <a href="{{ route('version.create') }}" class="btn btn-primary">Add Version</a>
        </div>

        <!-- Table Section -->
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th scope="col">Sl</th>
                    <th scope="col">Version Name</th>
                    <th scope="col">Card Id</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($versions as $index => $version)
                    <tr>
                        <td>{{ $version->id }}</td>
                        <td>{{ $version->name }}</td>
                        <td>{{ $version->card_id }}</td>
                        <td>
                            <!-- Edit Button -->
                            <a href="{{ route('version.edit', $version->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <!-- Delete Button -->
                            <form action="{{ route('version.delete', $version->id) }}" method="POST"
                                style="display:inline;"
                                onsubmit="return confirm('Are you sure you want to delete this version?');">
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
