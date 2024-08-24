<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormController extends Controller
{
    function addUserForm(Request $request)
    {
        // return $request;
        echo $request->username . "<br/>";
        echo $request->email . "<br/>";
        echo $request->city . "<br/>";
    }
}
