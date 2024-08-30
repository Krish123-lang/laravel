@extends('layout.app')

@section('title')
    Home
@endsection

{{-- Add search, export to xlsx and pdf and pagination functions --}}


@section('content')
    <a href="{{ route('posts.create') }}" class="btn btn-dark float-end">Create Post</a>

    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session()->get('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif


    <h1>Posts</h1>


    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Image</th>
                <th scope="col">Created/Updated at</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
            @if ($posts->isEmpty())
                <tr>
                    <td colspan="6" class="text-center fs-4">No posts found !</td>
                </tr>
            @else
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        <td><a {{-- href="{{ route('posts.show', $post->id) }}">{{ \Illuminate\Support\Str::words($post->title, 5, '...') }}</a> --}}
                                href="{{ route('posts.show', $post->id) }}">{{ \Illuminate\Support\Str::limit($post->title, 15, '...') }}</a>
                        </td>
                        {{-- <td>{{ \Illuminate\Support\Str::words($post->body, 5, '...') }}</td> --}}
                        <td>{{ \Illuminate\Support\Str::limit($post->body, 15, '...') }}</td>


                        <td><img src="{{ asset('uploads/images/' . $post->image) }}" width="70px" alt=""></td>

                        <td>{{ $post->updated_at }}</td>
                        <td><a href="{{ route('posts.edit', $post->id) }}" class="btn btn-sm btn-warning">Edit</a></td>
                        <td>
                            <form action="{{ route('posts.destroy', $post->id) }}" method="post"
                                enctype="multipart/form-data"
                                onsubmit="return confirm('Are you sure you want to delete the post {{ $post->title }}?');">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="d-flex justify-content-center">
        {!! $posts->links() !!}
    </div>
@endsection
