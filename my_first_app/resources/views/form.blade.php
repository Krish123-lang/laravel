<h1>Registration</h1>

<form action=" {{ url('/') }}/register " method="post">
    @csrf

    {{-- <pre>
    @php
        print_r($errors->all());
    @endphp
    </pre> --}}
    {{-- <br> --}}

    <x-input type="text" name="name" label="Please enter your name" />
    <x-input type="email" name="email" label="Please enter your email" />
    <x-input type="password" name="password" label="Please enter your password" />
    <x-input type="password" name="password_confirmation" label="Confirm Password" />

    {{-- <input type="text" name="name" placeholder="Name" value=" {{ old('name') }} "><br><br>
    <span>
        @error('name')
            {{ $message }}
        @enderror
    </span><br> --}}

    <input type="submit" value="Submit">
</form>
