@extends('layout.app')

@section('title')
    New docs
@endsection


@section('content')
    <a href="{{ route('userform') }}">Add User</a>
    <h1>This is content</h1>
    @foreach ($categories as $category)
        <h2>{{ $category->name }}</h2>
    @endforeach
@endsection
