@extends('app')
@push('style')
    <style>
        .pagination .page-item .page-link {
            font-size: 14px;
            padding: 5px 10px;
        }

        .pagination .page-item .page-link::before,
        .pagination .page-item .page-link::after {
            font-size: 14px;
        }
    </style>
@endpush

@section('content')
    <h1>Steps</h1>

    @if (Session::has('success'))
        {{ Session::get('success') }}
    @endif

    <a href="{{ route('create') }}">Create</a>

    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="search" placeholder="Search..." value="{{ $searchTerm ?? '' }}">
        <button type="submit">Search</button>
    </form>

    <table id="myTable" class="display">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>

        @if ($steps->count())
            @foreach ($steps as $step)
                <tr>
                    <td><a href="{{ route('show', $step->id) }}">{{ $step->name }}</a></td>
                    <td>{{ $step->email }}</td>
                    <td>{{ $step->phone }}</td>
                    <td>
                        <a href="{{ route('edit', $step->id) }}">Edit</a>
                        <form action="{{ route('delete', $step->id) }}" method="POST"
                            onsubmit="return confirmDelete(event)">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            {{ $steps->links() }}
        @else
            <p>No steps found.</p>
        @endif
    </table>
@endsection

@push('script')
    <script>
        function confirmDelete(event) {
            event.preventDefault();
            if (confirm("Do you really want to delete this step?")) {
                event.target.submit();
            }
        }
    </script>
@endpush
