<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;

// Route::get('/', function () {
//     return view('welcome');
// });


// Route::get('/demo/{name}/{id?}', function ($name, $id = null) {
//     // return view('demo');
//     // echo "Hello {$name} ";
//     $data = compact("name", "id");
//     return view('demo')->with($data);
// });


// Route::any('/test', function () {
//     echo "Testing Testing Testing Hello world";
// });


// Route::get('/{name?}', function ($name = null) {
//     // $demo = "<h2>Hello world</h2>";
//     // $data = compact("name", "demo");
//     $data = compact("name");
//     return view('home')->with($data);
// });

// Route::get('/', function () {
//     return view('layouts/main');
// });


Route::get('/', [DemoController::class, 'index']);
Route::get('/about', [DemoController::class, 'about']);
Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);

Route::get('/courses', SingleActionController::class, 'courses');

Route::resource('/photo', PhotoController::class);
