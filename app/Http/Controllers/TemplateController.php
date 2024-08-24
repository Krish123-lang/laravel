<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TemplateController extends Controller
{
    function fristTemplate($address)
    {
        $arr1 = ["apple", "ball", "cat"];
        return view('template.firstTemplate', ["xyz_address" => $address, "arr1" => $arr1]);
    }
}
