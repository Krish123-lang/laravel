@extends('layout.app')
@section('title')
    Posts
@endsection

@section('content')
    <h1>Posts</h1>
    <a href="{{ route('posts.index') }}" class="btn btn-primary mb-3">Go to Posts Page</a>
@endsection 
