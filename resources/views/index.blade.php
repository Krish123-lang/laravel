@extends('app')
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

    <table border="1px solid black">
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Image</th>
            <th>Actions</th>
        </tr>

        @if ($steps->count())
            @foreach ($steps as $step)
                <tr>
                    <td><a href="{{ route('show', $step->id) }}">{{ $step->name }}</a></td>
                    <td>{{ $step->email }}</td>
                    <td>{{ $step->phone }}</td>
                    <td>
                        @if ($step->image)
                            <img src="{{ asset('storage/' . $step->image) }}" alt="{{ $step->name }}" width="160">
                        @endif
                    </td>
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
