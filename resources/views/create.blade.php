@extends('layout.app')

@section('title')
    Create
@endsection


@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-dark float-end mb-3">Back to Posts</a>
    <h1>Create Post</h1>

    <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ old('title') }}">
            @error('title')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="3" name="body"> {{ old('body') }}</textarea>
            @error('body')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="image">
            @error('image')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Create</button>
        </div>
    </form>
@endsection
