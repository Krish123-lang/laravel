<?php

use App\Http\Controllers\FormController;
use App\Http\Controllers\PhotoController;
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
// Route::get('get-user/{name}/{age}', [UserController::class, 'getUser']);

// Route::get('details', [UserController::class, 'details']);

// Route::get('admin-login/{abc}', [UserController::class, 'adminLogin']);


// Group Controller 
Route::controller(UserController::class)->group(function () {
    Route::get('get-user/{name}/{age}', 'getUser');
    Route::get('details', 'details');
    Route::get('admin-login/{abc}', 'adminLogin');
});

// Templates
// Route::get('first-template/{xyz_address}', [TemplateController::class, 'fristTemplate']);

// Sub-view
// Route::get('inner', [TemplateController::class, 'inner']);
// Route::get('sub-about', function () {
//     return view('common.about');
// });

// newDocs
// Route::get('newdocs', [TemplateController::class, 'newdocs'])->name('newdocs');

// Template controller Group
Route::controller(TemplateController::class)->group(function () {
    Route::get('first-template/{xyz_address}', 'fristTemplate');
    Route::get('inner/{page}', 'inner');
    Route::get('newdocs', 'newdocs');
});


// Form/User-Input

// 'fileName', 'routeName'
Route::view('user-form', 'user-form')->name('userform');

// routeName, [ControllerName::class, 'functionNameInsideController']
Route::post('addUser', [FormController::class, 'addUserForm'])->name('adduser');


// Photo Controller
// Route::resource('photos', PhotoController::class);
Route::resources([
    'photos' => PhotoController::class,
    'create' => PhotoController::class,
    'store' => PhotoController::class,
]);


// Middleware
