<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UserController extends Controller
{
    function getUser($name, $age)
    {
        // return 'Krishna mandal';
        return view('getuser', ["name" => $name, "age" => $age]);
    }

    function details()
    {
        return view('details');
    }

    function adminLogin($name)
    {
        // checks if view exists or not
        if (View::exists('admin.login')) {
            return view('admin.login', ["abc" => $name]);
        } else {
            return "No view found !";
        }
    }
}
