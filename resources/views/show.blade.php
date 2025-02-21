@extends('app')

<a href="{{ route('index') }}">Back</a>

@section('content')
    <h1>{{ $step->name }}</h1>
    <p>{{ $step->email }}</p>
    <p>{{ $step->phone }}</p>
    @if ($step->image)
        <img src="{{ asset('storage/' . $step->image) }}" alt="{{ $step->name }}" width="160">
    @endif
@endsection
