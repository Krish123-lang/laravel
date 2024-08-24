<style>
    .success {
        background-color: green;
        color: #fff;
        padding: 5px;
        border-radius: 10px;
        margin: 10px;
        display: inline-block;
    }

    .error {
        background-color: red;
        color: #fff;
        padding: 5px;
        border-radius: 10px;
        margin: 10px;
        display: inline-block;
    }

    .warning {
        background-color: orangered;
        color: #fff;
        padding: 5px;
        border-radius: 10px;
        margin: 10px;
        display: inline-block;
    }
</style>
<div>
    <span class="{{ $class }}">{{ $msg }}!</span>
</div>
