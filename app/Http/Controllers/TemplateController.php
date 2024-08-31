<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TemplateController extends Controller
{
    function fristTemplate($address)
    {
        $arr1 = ["apple", "ball", "cat"];
        return view('template.firstTemplate', ["xyz_address" => $address, "arr1" => $arr1]);
    }

    function inner($page)
    {
        return view('common.inner', ['page' => $page]);
    }

    function newDocs()
    {
        // $allCategories = ['Category 1', 'Category 2'];
        // $allCategories = DB::table('categories')->get();
        $allCategories = Category::all();
        return view('newdocs', ['categories' => $allCategories]);
    }
}
