<?php

use App\Http\Controllers\TemplateController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function () {
    return view('home', ["name" => "Krishna Mandal"]);
});

Route::view('post',  '/post');

Route::get('/post/firstpost', function () {
    return view('firstpost');
});

Route::get('/about/{name}/{age}', function ($name, $age) {
    // echo $name. $age;
    return view('about', ["name" => $name, "age" => $age]);
});


Route::redirect('home', 'post');

// For controller
Route::get('get-user/{name}/{age}', [UserController::class, 'getUser']);

Route::get('details', [UserController::class, 'details']);

Route::get('admin-login/{abc}', [UserController::class, 'adminLogin']);


// Templates
Route::get('first-template/{xyz_address}', [TemplateController::class, 'fristTemplate']);
