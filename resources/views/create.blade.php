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
            separateDialCode: true, // Shows country code separately
            initialCountry: "np", // Default country (Nepal)
            preferredCountries: ["np", "in", "us"], // Preferred countries at the top
            utilsScript: "https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.8/js/utils.js",
        });

        // When the form is submitted, set the full phone number in a hidden input
        input.form.addEventListener("submit", function() {
            input.value = iti.getNumber(); // Gets the full number in E.164 format
        });
    </script>
@endpush
