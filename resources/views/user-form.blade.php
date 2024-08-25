<style>
    input[type=text],
    input[type=email] {
        border: orange 1px solid;
        height: 35px;
        width: 200px;
        border-radius: 5px;
        color: orange;
    }

    .input-wrapper {
        margin: 10px;
    }

    button {
        padding: 10px;
        border: none;
        border-radius: 10px;
        color: #fff;
        background-color: blue;
        cursor: pointer;
    }

    .input-error {
        border: 1px solid red;
        background-color: gray;
    }
</style>


{{-- Printing errors --}}
{{-- {{ print_r($errors) }} --}}

{{-- @if ($errors->any())
    @foreach ($errors->all() as $error)
        <div style="color: red">
            {{ $error }}
        </div>
    @endforeach
@endif --}}

<form action="addUser" method="post">
    @csrf
    <div class="input-wrapper">
        <label for="">Username</label>
        <input type="text" placeholder="username" name="username" value="{{ old('username') }}"
            class="{{ $errors->first('username') ? 'input-error' : '' }}">
        <span style="color: red">
            @error('username')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="input-wrapper">
        <label for="">email</label>
        <input type="email" placeholder="email" name="email" value="{{ old('email') }}"
            class="{{ $errors->first('email') ? 'input-error' : '' }}">
        <span style="color: red">
            @error('email')
                {{ $message }}
            @enderror
        </span>
    </div>
    <div class="input-wrapper">
        <label for="">city</label>
        <input type="text" placeholder="city" name="city" value="{{ old('city') }}"
            class="{{ $errors->first('city') ? 'input-error' : '' }}">
        <span style="color: red">
            @error('city')
                {{ $message }}
            @enderror
        </span>
    </div>

    <input type="checkbox" name="skill[]" id="php" value="PHP">PHP
    <input type="checkbox" name="skill[]" id="node" value="Node">Node
    <input type="checkbox" name="skill[]" id="java" value="Java">Java
    <span style="color: red">
        @error('skill')
            {{ $message }}
        @enderror
    </span>

    <br><br>

    Gender: <br>
    <label for="male">Male</label>
    <input type="radio" name="gender" id="male" value="male">
    <label for="female">Female</label>
    <input type="radio" name="gender" id="female" value="female">
    <br>
    <span style="color: red">
        @error('gender')
            {{ $message }}
        @enderror
    </span>
    <br>

    Town: <br>
    <select name="town" id="town">
        <option value="biratnagar">biratnagar</option>
        <option value="chitwan">chitwan</option>
        <option value="janakpur">janakpur</option>
        <option value="kathmandu">kathmandu</option>
        <option value="hetauda">hetauda</option>
    </select>
    <br>

    <span style="color: red">
        @error('town')
            {{ $message }}
        @enderror
    </span>
    <br>

    Age: <br>
    <input type="range" name="range" id="range" min="18" max="100"> <br>

    <div class="input-wrapper">
        <button type="submit">Submit</button>
    </div>
</form>
