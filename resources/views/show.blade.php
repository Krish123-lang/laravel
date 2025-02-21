@extends('app')

<a href="{{ route('index') }}">Back</a>

@section('content')
    <h1>{{ $step->name }}</h1>
    <p>{{ $step->email }}</p>
    <p>{{ $step->phone }}</p>
@endsection
