@extends('layout.app')
@section('title')
    Edit
@endsection

@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-dark float-end mb-3">Back to Posts</a>

    <h1>Edit: {{ $post->title }}</h1>


    <form action="{{ route('posts.update', $post->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Title</label>
            <input type="text" class="form-control" placeholder="Enter Title" name="title" value="{{ $post->title }}">
            @error('title')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" rows="3" name="body"> {{ $post->title }}</textarea>
            @error('body')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label class="form-label">Image</label>
            <input class="form-control" type="file" name="image">

            <img src="{{ asset('uploads/images/' . $post->image) }}" class="mt-3 rounded" width="500px" alt="">
            @error('image')
                <span style="color: red;">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-success">Update</button>
        </div>
    </form>
@endsection
