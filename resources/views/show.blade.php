@extends('layout.app')
@section('title')
    {{ $post->title }}
@endsection

@section('content')
    <a href="{{ route('posts.index') }}" class="btn btn-dark float-end mb-3">Back to Posts</a>

    <h1 class="text-decoration-underline my-3">Title</h1>
    <h1>{{ $post->title }}</h1>

    <hr>
    <h1 class="text-decoration-underline my-3">Description</h1>
    <p>{{ $post->body }}</p>

    <hr>

    <p>Created at: {{ $post->created_at }}</p>
    <p>Updated at: {{ $post->updated_at }}</p>
    
    <hr>

    <img src="{{ asset('uploads/images/' . $post->image) }}" class="rounded" width="500px" alt="">
@endsection
