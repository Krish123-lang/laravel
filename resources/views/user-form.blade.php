<style>
    input {
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
</style>



<form action="addUser" method="post">
    @csrf
    <div class="input-wrapper">
        <label for="">Username</label>
        <input type="text" placeholder="username" name="username">
    </div>
    <div class="input-wrapper">
        <label for="">email</label>
        <input type="email" placeholder="email" name="email">
    </div>
    <div class="input-wrapper">
        <label for="">city</label>
        <input type="text" placeholder="city" name="city">
    </div>
    <div class="input-wrapper">
        <button type="submit">Submit</button>
    </div>
</form>
