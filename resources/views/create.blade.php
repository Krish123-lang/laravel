@extends('app')

@section('content')
    <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="">Name</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}">
        @error('name')
            {{ $message }}
        @enderror

        <label for="">Email</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}">
        @error('email')
            {{ $message }}
        @enderror

        <label for="phone">Phone Number</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}">
        @error('phone')
            {{ $message }}
        @enderror

        <label for="">Image</label>
        <input type="file" name="image" id="image">
        @error('image')
            {{ $message }}
        @enderror

        <input type="submit" value="Create">
    </form>
@endsection

@push('script')
    <script>
        var input = document.querySelector("#phone");
        var iti = window.intlTelInput(input, {
            separateDialCode: true,
            initialCountry: "np",
            preferredCountries: ["np", "in", "us"],
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        input.form.addEventListener("submit", function() {
            input.value = iti.getNumber(); 
        });
    </script>
@endpush
